<?php

namespace App\Http\Controllers\Siscorp\Candados\Remolque;

use App\Http\Controllers\Controller;
use App\Services\Consume\CandadosApi\CandadosApiConsume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandadosRemolqueController extends Controller
{
    public function indexRemolque(){
        return view('candados.remolque.index');
    }

    public function getListaCandadosParticular(CandadosApiConsume $candados)
    {
        $datos = [
            'control' => self::CONTROL_CARGA
        ];
        $lista = $candados->consumeListaCandados($datos);
        return $lista;
    }
    public function setDownCandadoRemolque(Request $request,CandadosApiConsume $candados){
        $request['control'] = self::CONTROL_CARGA;
        $user = Auth::user();
        $resultado = $candados->downCandado($request->all());
        $this->logActividad($user->id,  'RowId:'.$request->all()['rowid'].'|Oficio Baja:'.$request->all()['oficiobaja'].'|Ip:'.$request->getClientIp(),'BAJA CANDADO', $user->direccion_id);
        return $resultado;
    }

    public function setCandadoRemolque(Request $request,CandadosApiConsume $candados){
        $request['control'] = self::CONTROL_CARGA;
        $resultado = $candados->defineCandados($request->all());
        $user = Auth::user();
        $this->logActividad($user->id,  'Placa:'.$request->all()['placa'].'|serievh:'.$request->all()['serievh'].'|Oficio'.$request->all()['noficio'].'|cvecandado'.$request->all()['cvecandado'].'|Ip:'.$request->getClientIp(),'BAJA CANDADO', $user->direccion_id);

        return $resultado;
    }
    public function getCandadosRemolque(Request $request,CandadosApiConsume $candados){
        $request['control'] = self::CONTROL_CARGA;
        $resultado = $candados->getCandados($request->all());
        $user = Auth::user();
        $this->logActividad($user->id,  'Placa:'.$request->all()['placa'].'|serievh:'.$request->all()['serievh'].'|Ip:'.$request->getClientIp(),'BUSCA CANDADO', $user->direccion_id);

        return $resultado;
    }

}

