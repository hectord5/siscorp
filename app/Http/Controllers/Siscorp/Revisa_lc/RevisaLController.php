<?php

namespace App\Http\Controllers\Siscorp\Revisa_lc;

use App\Http\Controllers\Controller;
use App\Services\Consume\Oracle\ServiceCsharpConsume;
use App\Services\Consume\SicoveApi\SicoveApiConsume;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RevisaLController extends Controller
{
    public function buscaLC(){
        return view('revisor_lc.busca_lc');
    }

    public function resumenLC (Request $request, SicoveApiConsume $sicove,ServiceCsharpConsume $lcWs ){
//        $respuestaPago = $sicove->consumeDatosLC($request->lc);
          $respuestaPago = $lcWs->consumeConsultaLc(["lineaCaptura"=>$request->lc]);
//        $respuestaTramite = $sicove->consumeResumenLC($request->lc);
        $respuestaTramite = $lcWs->consumeConsultaLc(["lineaCaptura"=>$request->lc]);
        if(isset($respuestaTramite['code']) && $respuestaTramite['code'] !== 200){
            $respuestaTramite = $lcWs->consumeConsultaLc(["lineaCaptura"=>$request->lc]);
        }
        $datosPago =  isset($respuestaPago['data'])?$respuestaPago['data']:$respuestaPago;
        $datosTramite =  isset($respuestaTramite['data'])?$respuestaTramite['data']:$respuestaTramite;
        if ($datosPago['lcPagada'] == false)
            return view('revisor_lc.busca_lc')->withErrors('La linea de captura no existe o no ha sido pagada');

        return view('revisor_lc.resumen_lc')->with('pago', $datosPago)->with('tramite', $datosTramite);
    }

    public function ImprimeLC(Request $request, SicoveApiConsume $sicove, ServiceCsharpConsume $lcWs ){
        $respuestaPago = $lcWs->consumeConsultaLc(["lineaCaptura"=>$request->lc]);
        $respuestaTramite = $lcWs->consumeConsultaLc(["lineaCaptura"=>$request->lc]);
        if(isset($respuestaTramite['code']) && $respuestaTramite['code'] !== 200){
            $respuestaTramite = $lcWs->consumeConsultaLc(["lineaCaptura"=>$request->lc]);
        }
        $datosPago = $respuestaPago == false? 'no se encontraron datos': $respuestaPago['data'];
        if (isset($respuestaTramite['code']) && $respuestaTramite['code'] == 422){
            $datosTramite = $respuestaTramite['error'];
        }else{
            $datosTramite =$respuestaTramite == false? 'no se encontraron datos': $respuestaTramite['data'];
        }
        $datos['pago']=$datosPago;
        $datos['tramite']=$datosTramite;
        $user = Auth::user();
        $pdf = PDF::loadView('revisor_lc.lc_pdf', compact('datos',));
        $this->logActividad($user->id, 'CONSULTA DE LINEAS DE CAPTURA.', 'VERIFICACION DE LA LINEA:'.$datos['pago']['dataPago'][0]['lc'], $user->direccion_id);

        $nombre_pdf = 'Acuse_SISCORP_pdf';

        return $pdf->stream($nombre_pdf);

    }

    public function descargaZip(Request $request){
        if(Storage::exists('public/'.$request->nombre.'.zip')){
            return Storage::download('public/'.$request->nombre.'.zip');
        }else{
            return redirect()->route('archivo.404');
        }
//        return Storage::download($request->nombre);


    }

}
