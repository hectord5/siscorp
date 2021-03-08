<?php

namespace App\Http\Controllers\Siscorp\Licencias;

use App\Http\Controllers\Controller;
use App\Services\Consume\Oracle\ServiceCsharpConsume;
use App\Services\Consume\SicoveApi\SicoveApiConsume;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\DeclareDeclare;
use SimpleSoftwareIO\QrCode\Facade as QrCode;

class LicenciasController extends Controller
{
    public function ControlLicencias(){
        return view('licencias.busca_licencia')->with('ruta','getInfoLicencia');
    }
    public function ControlLicenciasPorFolio(){
        return view('licencias.busca_licencia_folio')->with('ruta','getInfoLicenciaFolio');
    }

    public function getInfoLicencia(Request $request, ServiceCsharpConsume $licencias)
    {
        $param=["curpLicencia"=>$request->curp];
        $licencia=$licencias->getLicenciasCurp($param);
        $candados = $licencias->consumeResumenCandados(["curpLicencia"=>$request->rfc_lic,"tipoLicencia"=>$request->tipo_lic]);
        $datos['foto_lic'] =  $licencia['data']['fotoLicencia'] == null? 'avatar.jpg':  $licencia['data']['fotoLicencia'];
        $datos['huella_lic'] =  $licencia['data']['huellaLicencia'] == null? 'avatar.jpg':  $licencia['data']['huellaLicencia'];
        $datos['firma_lic'] =  $licencia['data']['firmaLicencia'] == null? 'avatar.jpg':  $licencia['data']['firmaLicencia'];
        if(isset($licencia['data']['dataLicencias'])){
            foreach ($licencia['data']['dataLicencias'] as $indice => $dato){
                $curpCompleto = $request->curp;
                if($indice == 0){
                    $ultimalic[$dato['curp']] = $dato;
//                    dd($dato);
                }
            }
            return view('licencias.resultados')->with('datos',$ultimalic)->with('dataCurp',$curpCompleto);
//                ->with('candados',$candados['data']);
        }else{
            return view('licencias.busca_licencia')->with('ruta','getInfoLicencia')
                ->withErrors('No existen registros relacionados al CURP/RFC ingresado');
        }
    }
    public function getInfoLicenciaFolio(Request $request, ServiceCsharpConsume $licencias)
    {
        $param=["folioLicencia"=>(int)$request->folio_lic,"tipoLicencia"=>$request->tipo_lic];
        $licencia=$licencias->getLicenciasFolio($param);
        $candados = $licencias->consumeResumenCandados(["curpLicencia"=>$request->folio_lic,"tipoLicencia"=>$request->tipo_lic]);
        if(isset($licencia['data']['dataLicencias'])){
            $datos_lic=$licencia['data']['dataLicencias'];
            $foto_lic=$licencia['data']['fotoLicencia'];
            $firma_lic=$licencia['data']['firmaLicencia'];
            $huella_lic=$licencia['data']['huellaLicencia'];
            return view('licencias.resultados')->with('datos',$datos_lic)
                ->with('foto',$foto_lic)
                ->with('huella',$huella_lic)
                ->with('firma',$firma_lic)
                ->with('candados',$candados['data']);

        }else{
            return view('licencias.busca_licencia')->with('ruta','getInfoLicenciaFolio')->withErrors('No existen registros relacionados al CURP/RFC ingresado');
        }
    }

    protected function  consultaSoapService ($url, $param,$operation){
        try{
            $client = new \nusoap_client($url, 'wsdl');
            $result = $client->call($operation, $param);
            return $result;
        }catch (\Exception $exception) {
            return null;
        }
    }

    public function resumenCandados(Request $request, ServiceCsharpConsume $candados){
        $respuesta = $candados->consumeResumenCandados(["curpLicencia"=>$request->rfc,"tipoLicencia"=>$request->tipo_lic]);
        if (isset($respuesta['data']['datacandados'])){
            $datos=['data']['datacandados'];
            return view('licencias.resultados')->with('datos',$datos);
        }
        else{
            return view('licencias.busca_licencia')->with('ruta','getInfoLicencia')->withErrors('No existen registros relacionados al CURP/RFC ingresado');
        }
    }

    public function ImprimeSabanaLicencia(Request $request, ServiceCsharpConsume $licencias){
//        dd($request);
        $param=["curplicencia"=>$request['curp']];
        $licencia=$licencias->getLicenciasCurp($param);
        $datos=array();
        $usuario = Auth::user();
        foreach ($licencia['data']['dataLicencias'] as $indice => $dato)
        {
//            dd($dato['folio'] == $request->folio);
            if($dato['folio'] == $request->folio)
            {
//                dd($dato['folio'],$dato['tipo_licencia'],$dato['curp']);
                $datos['datos_lic'] = $dato;
            }
        }
        $datos['foto_lic'] =  $licencia['data']['fotoLicencia'] == null? 'avatar.jpg':  $licencia['data']['fotoLicencia'];
        $datos['huella_lic'] =  $licencia['data']['huellaLicencia'] == null? 'avatar.jpg':  $licencia['data']['huellaLicencia'];
        $datos['firma_lic'] =  $licencia['data']['firmaLicencia'] == null? 'avatar.jpg':  $licencia['data']['firmaLicencia'];
//        $datos['fecha_expedicion_sabana'] = date('Y-m-d, h-i-s');
        $datos['username'] = $usuario->username;

//        $datos['candados']= $candados['data'];
        $layout = 'licencias.sabana_licencia';
        $pdf = PDF::loadView($layout, compact('datos'));
        $this->logActividad($usuario->id, 'GENERA SABANA DE LICENCIA.', 'CONSULTA DE LICENCIA CON FOLIO:'.$datos['datos_lic']['folio'], $usuario->direccion_id);

        $nombre_pdf = 'Acuse_SISCORP_pdf';

        return $pdf->stream($nombre_pdf);

    }

}

