<?php

namespace App\Http\Controllers\Siscorp\Candados\Ruta;

use App\Http\Controllers\Controller;
use App\Services\Consume\CandadosApi\CandadosApiConsume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandadosRutaController extends Controller
{
    public function indexRuta(){
        return view('candados.ruta.index');
    }

    public function getListaCandadosParticular(CandadosApiConsume $candados)
    {
        $datos = [
            'control' => self::CONTROL_MICRO
        ];
        $lista = $candados->consumeListaCandados($datos);
        return $lista;
    }
    public function setDownCandadoRuta(Request $request,CandadosApiConsume $candados){
        $request['control'] = self::CONTROL_MICRO;
        $user = Auth::user();
        $resultado = $candados->downCandado($request->all());
        $this->logActividad($user->id,  'RowId:'.$request->all()['rowid'].'|Oficio Baja:'.$request->all()['oficiobaja'].'|Ip:'.$request->getClientIp(),'BAJA CANDADO', $user->direccion_id);
        return $resultado;
    }

    public function setCandadoRuta(Request $request,CandadosApiConsume $candados){
        $request['control'] = self::CONTROL_MICRO;
        $resultado = $candados->defineCandados($request->all());
        $user = Auth::user();
        $this->logActividad($user->id,  'Placa:'.$request->all()['placa'].'|serievh:'.$request->all()['serievh'].'|Oficio'.$request->all()['noficio'].'|cvecandado'.$request->all()['cvecandado'].'|Ip:'.$request->getClientIp(),'BAJA CANDADO', $user->direccion_id);

        return $resultado;
    }
    public function getCandadosRuta(Request $request,CandadosApiConsume $candados){
        $request['control'] = self::CONTROL_MICRO;
        $resultado = $candados->getCandados($request->all());
        $user = Auth::user();
        $this->logActividad($user->id,  'Placa:'.$request->all()['placa'].'|serievh:'.$request->all()['serievh'].'|Ip:'.$request->getClientIp(),'BUSCA CANDADO', $user->direccion_id);

        return $resultado;
    }

}

