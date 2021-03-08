<?php

namespace App\Http\Controllers\Siscorp\Candados\Licencias;

use App\Http\Controllers\Controller;
use App\Services\Consume\AlfredApi\AlfredApiConsume;
use App\Services\Consume\CandadosApi\CandadosApiConsume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandadosLicenciasController extends Controller
{

    public function crea_candado(Request $request,AlfredApiConsume $candados){
        $datos = $candados->consultaSoapService();
        dd($datos);

        if( $request['date_ini']>=$request['date_fin'])
        {
            return redirect()->route('pl.li_1')
                ->withErrors(array('warning','ERROR EN LA FECHA', 'LAS FECHAS NO PUEDEN SER IGUALES'));
        }
        if($datos == '')
        {
            return redirect()->route('pl.li_1')
                ->withErrors(array('warning','ERROR EN CURP','NO SE ENCONTRO CURP' ));
        }
        $request['txt_nombre']=strtoupper($datos['BuscaLicenciaxCurpResult']['Nombre']);
        $request['txt_paterno']=strtoupper($datos['BuscaLicenciaxCurpResult']['Paterno']);
        $request['txt_materno']=strtoupper($datos['BuscaLicenciaxCurpResult']['Materno']);
        $request['txt_folio']=strtoupper($datos['BuscaLicenciaxCurpResult']['Folio1']);
        $user = Auth::user();
        $id_user=$user->id;
        $user = $user->rfc;
        $ip = $request->getClientIp();
        $service_soap=new ServiceSoap();
        $create=$service_soap->inserta_candado_licencias($request,$user,$id_user,$ip);
        if($create['errCode'] == true)
        {

            return redirect()->route('pl.li_1')
                ->withErrors(array('success','CANDADO APLICADO', 'Se aplico el candado correctamente'));
        }
        elseif($create['errCode'] == false)
        {

            return redirect()->route('pl.li_1')
                ->withErrors(array('warning','NO SE APLICO EL CANDADO', 'Hubo algun error al ingresar los datos'));
        }
        else
        {

            return redirect()->route('pl.li_1')
                ->withErrors(array('warning','SERVICIO NO DISPONIBLE', 'Hubo algun error en el servicio'));
        }
        return redirect()->route('pl.li_1')
            ->withErrors(array('success','Se encontro CURP', 'ÉXITO EN CURP'));
    }
    public function quita_candado(Request $request,CandadosApiConsume $candados){
        $user = Auth::user();
        $id_user=$user->id;
        $user = $user->rfc;
        $ip = $request->getClientIp();
        $service_soap=new ServiceSoap();
        $create=$service_soap->baja_candado($request,$user,$id_user,$ip);
        if($create['errCode'] == true)
        {
            $this->bitacora(self::CONTROL_LICENCIAS,'BAJA',$user,$request->getClientIp(),$create['errCode']);
            return redirect()->route('pl.li_1')
                ->withErrors(array('success','CANDADO CANCELADO', 'Se dio de baja el candado correctamente'));
        }
        elseif($create['errCode'] == false)
        {
            $this->bitacora(self::CONTROL_LICENCIAS,'BAJA',$user,$request->getClientIp(),$create['errCode']);
            return redirect()->route('pl.li_1')
                ->withErrors(array('warning','NO SE APLICO LA BAJA DE CANDADO', 'Hubo algun error al ingresar los datos'));
        }
        else
        {
            $this->bitacora(self::CONTROL_LICENCIAS,'BAJA',$user,$request->getClientIp(),$create['errCode']);
            return redirect()->route('pl.li_1')
                ->withErrors(array('warning','SERVICIO NO DISPONIBLE', 'Hubo algun error en el servicio'));
        }
    }

}

