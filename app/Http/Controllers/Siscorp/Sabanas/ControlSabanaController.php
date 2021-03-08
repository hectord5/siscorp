<?php

namespace App\Http\Controllers\Siscorp\Sabanas;

use App\Http\Controllers\Controller;
use App\Services\Consume\SicoveApi\SicoveApiConsume;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facade as QrCode;
use App\Mail\EnviaMail;
use Illuminate\Support\Facades\Mail;
use function GuzzleHttp\Psr7\str;
set_time_limit(0);
ini_set('memory_limit','256M');
class ControlSabanaController extends Controller
{
    public function EligeControl(SicoveApiConsume $sicove){
        $datos_controles = $this->listadoControles($sicove);
        return view('controles.sabanas.controles')->with('datos_controles',$datos_controles);
    }

    public function GetSabanasMasivas(Request $request,SicoveApiConsume $sicove){
        $user = Auth::user();
        $nombre_fichero = storage_path('pdf/'.$user->id);
        if(file_exists($nombre_fichero)){
            echo "Usted ya tiene una consulta en proceso, por favor espere a que termine el proceso anterior";
            exit();
        }
        echo "Se enviara un correo a: ".$request->mail." cuando finalice el proceso";
        $creado = $this->creaCarpeta($nombre_fichero);

        if ($creado){
            $archivo = $request->csv;
//            $archivo = $request->file('csv')->getRealPath();
            $f = fopen($archivo, 'r');
            while (($data = fgetcsv($f)) !== false) {
                $sabana = $sicove->consumeResumenPorPlaca( 'placa',$data[0]);
                $creo_sabana = $this->generaSabana( $sabana,$user->id );
                if (!$creo_sabana)
                    continue;

            }
        }

        $store = $this->generaZip($nombre_fichero);
        $link = url('descarga/'.str_replace('public/','',$store));
        $link = str_replace('.zip','',$link);
        $this->send($request->mail,$link,"SISCORP",$user->username);
        $this->eliminaCarpeta($nombre_fichero);
    }
    function creaCarpeta($nombre_fichero){
        $this->eliminaCarpeta($nombre_fichero);

        if(!mkdir($nombre_fichero, 0777, true)) {
            die('Fallo al crear las carpetas...');
        }else{
            chmod($nombre_fichero, 0777);
        }
        return true;
    }
    function generaZip($nombre_fichero){
        $zip_file = storage_path('pdf/sabanas.zip');
//        $zip_file = '/tmp/sabanas.zip';
        $zip = new \ZipArchive();
        $zip->open( $zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE );
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($nombre_fichero));
        foreach ($files as $name => $file)
        {
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();
                $relativePath = 'sabanas/' . substr($filePath, strlen($nombre_fichero) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        return Storage::putFile('public', $zip_file);

    }
    public function generaSabana($datos,$user_id){
        $respuesta = $datos;
        if (isset($respuesta['data'][0]))
            $datos = $respuesta['data'][0];
        else
            return false;

        $user = Auth::user();
        $fmt = new \NumberFormatter( 'es_MX', \NumberFormatter::CURRENCY );
        $datos['importe_factura'] = $fmt->formatCurrency($datos['importe_factura'], "MEX");
        $datos['username'] = $user->username;
        $contenid_qr='Placa: '.$datos['placa'].'
Folio Identificador: '.$datos['linea_captura'].'_'.now()->getTimestamp();
        if(isset($datos['cmcub']) && $datos["cmcub"] != null){
            $layout = 'sabanas.sabana_moto';
        }
        else{
            $layout = 'sabanas.sabana';
        }
        $qrcode = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate($contenid_qr));
        $datos['QR'] = $qrcode;
        $pdf = PDF::loadView($layout, compact('datos'));

        $nombre_pdf = 'Reporte_SISCORP_'.$datos['placa'].'.pdf';

        $path = storage_path('pdf/'.$user_id.'/'.$nombre_pdf);

        $pdf->save( $path );
        return true;

    }
    public function send($destinaratio,$link,$nom_destinatario,$nom_envia)
    {
        $objDemo = new \stdClass();
        $objDemo->link = $link;
        $objDemo->sender = $nom_destinatario;
        $objDemo->receiver = $nom_envia;

        Mail::to($destinaratio)->send(new EnviaMail($objDemo));
    }
    public function eliminaCarpeta($nombre_fichero){
        if (file_exists($nombre_fichero)) {
            $objects = scandir($nombre_fichero);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($nombre_fichero. DIRECTORY_SEPARATOR .$object) && !is_link($nombre_fichero."/".$object))
                        rmdir($nombre_fichero. DIRECTORY_SEPARATOR .$object);
                    else
                        unlink($nombre_fichero. DIRECTORY_SEPARATOR .$object);
                }
            }
            rmdir($nombre_fichero);
        }
    }

}
