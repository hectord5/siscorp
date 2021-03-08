<?php

namespace App\Http\Controllers\Siscorp\Historial;

use App\Http\Controllers\Controller;
use App\Mail\EnviaMail;
use App\Services\Consume\SicoveApi\SicoveApiConsume;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
set_time_limit(0);
ini_set('memory_limit','256M');

class ControlHistorialController extends Controller
{

    public function EligeControl(SicoveApiConsume $sicove){
        $datos_controles = $this->listadoControles($sicove);
        return view('controles.historial.controles')->with('datos_controles',$datos_controles);
    }
    public function buscarHistorial(Request $request, SicoveApiConsume $sicove){
        $respuesta = $sicove->consumeHistorialPorVehiculo( $request->campo, $request->valor, $request->tipo_control );
//        dd($respuesta);
        if( isset($respuesta["data"]) && count($respuesta["data"])>0 ){
//            $fmt = new \NumberFormatter( 'es_MX', \NumberFormatter::CURRENCY );
            return view('controles.historial.resultados_busqueda')->with('datos',$respuesta['data'])
                ->with('campo_valor',$request->valor);
//                ->with('formato',$fmt);
        }else{
            $datos_controles = $this->listadoControles($sicove);
            return view('controles.historial.controles')
                ->with('datos_controles',$datos_controles);
        }

    }

    public function imprimeHistorial(Request $request){
        $datos =array();
        $usuario = Auth::user();
        foreach (json_decode($request->datos_historial) as $v){
            $datos[] = (array)$v;
        }
        $fmt = new \NumberFormatter( 'es_MX', \NumberFormatter::CURRENCY );
        foreach ($datos as $ind => $val){
            $val['importe_factura'] = $fmt->formatCurrency($val['importe_factura'], "MEX");
        }

        $layout = 'historial_movimientos.pdf.historial';
        $datos[0]['revisor'] = $usuario->username;
        $pdf = PDF::loadView($layout, compact('datos'));
        $this->logActividad($usuario->id, 'GENERA RESUMEN DE HISTORIAL DE MOV.', 'CONSULTA HISTORIAL DE MOVIMINETOS DE LA LC:'.$datos[0]['linea_captura'], $usuario->direccion_id);

        $nombre_pdf = 'Reporte_adeudos_SISCORP_'.$datos[0]['placa'].'.pdf';

        return $pdf->stream($nombre_pdf);

    }

    public function GetHistorialMasivo(Request $request,SicoveApiConsume $sicove){
        $user = Auth::user();
        $nombre_fichero = storage_path('pdf-historiales/'.$user->id);
        if(file_exists($nombre_fichero)){
            echo "Usted ya tiene una consulta en proceso, por favor espere a que termine el proceso anterior, se le enviara un correo cuando finalice el proceso";
            exit();
        }
        echo "Se enviara un correo a: ".$request->mail." cuando finalice el proceso";
        $creado = $this->creaCarpeta($nombre_fichero);

        if ($creado){
            $archivo = $request->csv;
            $f = fopen($archivo, 'r');
            while (($data = fgetcsv($f)) !== false) {
                $historial = $sicove->consumeResumenPorPlaca( 'placa',$data[0],'&re=all');
                $creo_sabana = $this->generaHistorial( $historial,$user );//cambiar servicioq
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

    public function generaHistorial($datos,$usuario){
        $respuesta = $datos;
        if (isset($respuesta['data'][0]))
            $datos = $respuesta['data'];
        else
            return false;

        $fmt = new \NumberFormatter( 'es_MX', \NumberFormatter::CURRENCY );
        foreach ($datos as $ind => $val){
            $val['importe_factura'] = $fmt->formatCurrency($val['importe_factura'], "MEX");
        }

        $layout = 'historial_movimientos.pdf.historial';
        $datos[0]['revisor'] = $usuario->username;
        $pdf = PDF::loadView($layout, compact('datos'));
        $nombre_pdf = 'Reporte_SISCORP_'.$datos[0]['placa'].'.pdf';


//        $nombre_pdf = 'Reporte_SISCORP_'.$datos['placa'].'.pdf';

        $path = storage_path('pdf-historiales/'.$usuario->id.'/'.$nombre_pdf);
        $pdf->save( $path );
        return true;

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
        $zip_file = storage_path('pdf/historial.zip');
//        $zip_file = '/tmp/historial.zip';
        $zip = new \ZipArchive();
        $zip->open( $zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE );
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($nombre_fichero));
        foreach ($files as $name => $file)
        {
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();
                $relativePath = 'historial/' . substr($filePath, strlen($nombre_fichero) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        return Storage::putFile('public', $zip_file);

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
