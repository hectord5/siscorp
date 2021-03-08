<?php

namespace App\Http\Controllers\Siscorp\Candados\Taxi;

use App\Http\Controllers\Controller;
use App\Services\Consume\CandadosApi\CandadosApiConsume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CandadosTaxiController extends Controller
{
    public function index(){
        return view('candados.taxi.index');
    }

    public function consultaCandado(CandadosApiConsume $candados,Request $request){
        $user = Auth::user();
        $candados = $candados->consultaCandadoTaxi(array(
            "placa"=>$request->get('placa'),
            "foliotaxi"=>$request->get('folio_taxi')
        ));
        $this->logActividad($user->id,  'Placa:'.$request->get('placa').'|folioTaxi:'.$request->get('foliotaxi').'|Ip:'.$request->getClientIp(),'BUSQUEDA CANDADO', $user->direccion_id);

        return $candados;
    }

    public function activacionCandado(CandadosApiConsume $candados,Request $request){
        $user = Auth::user();
        $candados = $candados->insertaCandadoTaxi(array(
            "placa"=>$request->get('placa'),
            "foliotaxi"=>$request->get('folio_taxi'),
            "fecha"=> date('Y-m-d H:i:s'),
            "referencia"=>"Activado por Oficio: ".$request->get('oficio')." ,emitido por: ".$request->get('documento')." donde se expresa: ".$request->get('motivo'),
            "usuario"=>$user->username
        ));
        $this->logActividad($user->id,  'Placa:'.$request->get('placa').'|folioTaxi:'.$request->get('foliotaxi').'|Ip:'.$request->getClientIp(),'ALTA CANDADO', $user->direccion_id);
        return $candados;
    }

    public function desativacionCandado(CandadosApiConsume $candados,Request $request){
        $user = Auth::user();
        $candados = $candados->actualizaCandadoTaxi(array(
            "tipo_candado"=>$request->get('candado'),
            "foliotaxi"=>$request->get('taxi'),
            "fecha"=> date('Y-m-d H:i:s'),
            "referencia"=>"Desactivado por el usuario: ".$user->username,
            "usuario"=>Auth::user()->name
        ));
        $this->logActividad($user->id,  'tipo_candado:'.$request->get('candado').'|folioTaxi:'.$request->get('foliotaxi').'|Ip:'.$request->getClientIp(),'DESACTIVA CANDADO', $user->direccion_id);
        return $candados;
    }

}

