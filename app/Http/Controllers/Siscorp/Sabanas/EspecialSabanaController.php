<?php

namespace App\Http\Controllers\Siscorp\Sabanas;

use App\Http\Controllers\Controller;
use App\Services\Consume\SicoveApi\SicoveApiConsume;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use SimpleSoftwareIO\QrCode\Facade as QrCode;

class EspecialSabanaController extends Controller
{
    public function seleccionaEmpresa($tipo_control){
        return view('sabanas.Empresa.busca')->with('tipo_control',$tipo_control)->with('ruta','sabanas.buscar.empresa.especial');
    }

    public function buscaPorEmpresa(Request $request, SicoveApiConsume $sicove){

        $respuesta = $sicove->consumeResumenPorEmpresa( $request->campo, $request->valor,$request->tipo_control);
        if( !$respuesta || (isset($respuesta['data']) && $respuesta['data'] == false) ){
            return view('sabanas.Empresa.busca')->with('tipo_control',$request->tipo_control)->with('ruta','sabanas.buscar.empresa.especial')
                ->withErrors('No se encontraron resultados con los parametros de busqueda');
        }
        $controles = $sicove->getListaControles();
        $res = $this->filtroActivas($respuesta['data']);
        if( count($res) == 0)
            return view('sabanas.Empresa.busca')->with('tipo_control',$request->tipo_control)->with('ruta','sabanas.buscar.empresa.especial')
                ->withErrors('No se encontraron resultados con los parametros de busqueda');

        $res = $this->filtroTipoControl($res ,$request->tipo_control);
        if( count($res) == 0)
            return view('sabanas.Empresa.busca')->with('tipo_control',$request->tipo_control)->with('ruta','sabanas.buscar.empresa.especial')
                ->withErrors('No se encontraron resultados con los parametros de busqueda');
        return view('sabanas.muestra_resultados' )
            ->with('respuesta',$res )
            ->with('campo',$request->campo )
            ->with('controles',$controles['data'] );
    }

    public function seleccionaCiudadano($tipo_control){
        return view('sabanas.Ciudadano.busca')->with('tipo_control',$tipo_control)->with('ruta','sabanas.buscar.ciudadano.especial');
    }

    public function buscaPorCiudadano(Request $request, SicoveApiConsume $sicove){
        $valor = $request->valor;
        $campo = $request->campo;
        if($campo !== 'curp'){
            $valor['nombre'] = $request->nombre;
            $valor['paterno'] = $request->apellido1;
            $valor['materno'] = $request->apellido2;
        }
        $respuesta = $sicove->consumeResumenPorCiudadano( $campo, $valor,  $request->tipo_control);
        if( !$respuesta || (isset($respuesta['data']) && $respuesta['data'] == false) ){
            return view('sabanas.Ciudadano.busca')->with('tipo_control',$request->tipo_control)->with('ruta','sabanas.buscar.ciudadano.especial')
                ->withErrors('No se encontraron resultados con los parametros de busqueda');
        }
        $controles = $sicove->getListaControles();
        $res = $this->filtroActivas($respuesta['data']);
        if( count($res) === 0)
            return view('sabanas.Ciudadano.busca')->with('tipo_control',$request->tipo_control)->with('ruta','sabanas.buscar.ciudadano.especial')
                ->withErrors('No se encontraron resultados con los parametros de busqueda');

        $res = $this->filtroTipoControl($res ,$request->tipo_control);
        if( count($res) === 0)
            return view('sabanas.Ciudadano.busca')->with('tipo_control',$request->tipo_control)->with('ruta','sabanas.buscar.ciudadano.especial')
                ->withErrors('No se encontraron resultados con los parametros de busqueda');

        return view('sabanas.muestra_resultados')
            ->with('respuesta',$res)
            ->with('campo',$request->campo)
            ->with('controles',$controles['data']);
    }

    public function seleccionaVehiculo($tipo_control){
        return view('sabanas.Vehiculo.busca')->with('tipo_control',$tipo_control)->with('ruta','sabanas.buscar.vehiculo.especial');
    }

    public function buscaPorVehiculo(Request $request, SicoveApiConsume $sicove){
        $respuesta = $sicove->consumeResumenPorVehiculo( $request->campo,$request->valor,  $request->tipo_control);
        if( !$respuesta || (isset($respuesta['data']) && $respuesta['data'] == false) ){
            return view('sabanas.Vehiculo.busca')->with('tipo_control',$request->tipo_control)->with('ruta','sabanas.buscar.vehiculo.especial')
                ->withErrors('No se encontraron resultados con los parametros de busqueda');
        }
        $controles = $sicove->getListaControles();
        $res = $this->filtroActivas($respuesta['data']);
        if( count($res) === 0)
            return view('sabanas.Vehiculo.busca')->with('tipo_control',$request->tipo_control)->with('ruta','sabanas.buscar.vehiculo.especial')
                ->withErrors('No se encontraron resultados con los parametros de busqueda');

        $res = $this->filtroTipoControl($res ,$request->tipo_control);
        if( count($res) === 0)
            return view('sabanas.Vehiculo.busca')->with('tipo_control',$request->tipo_control)->with('ruta','sabanas.buscar.vehiculo.especial')
                ->withErrors('No se encontraron resultados con los parametros de busqueda');

        return view('sabanas.muestra_resultados')
            ->with('respuesta',$res)
            ->with('campo',$request->campo)
            ->with('controles',$controles['data']);
    }

    public function generaSabana($lc, SicoveApiConsume $sicove){
        $respuesta = $sicove->consumeResumenLC($lc);
        $datos = $respuesta['data'][0];
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

        return $pdf->stream($nombre_pdf);

    }
    public function generaSabanaWord($lc, SicoveApiConsume $sicove){//incompleta la forma de esta funcion
//        ${solonombre} asi se ocupa en el word
//        ${soloapellido} asi se ocupa en el word
//        $respuesta = $sicove->consumeResumenLC($lc);
        $this->hasSabana(array('nombre'=>'hector','apellido'=>'apa'));
    }

}
