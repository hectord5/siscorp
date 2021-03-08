<?php

namespace App\Http\Controllers\Siscorp\Candados\Antiguo;

use App\Http\Controllers\Controller;
use App\Services\Consume\CandadosApi\CandadosApiConsume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandadosAntiguoController extends Controller
{
    public function indexAntiguo(){
        return view('candados.antiguo.index');
    }

    public function getListaCandadosParticular(CandadosApiConsume $candados)
    {
        $datos = [
            'control' => self::CONTROL_ANTIGUOS
        ];
        $lista = $candados->consumeListaCandados($datos);
        return $lista;
    }
    public function setDownCandadoAntiguo(Request $request,CandadosApiConsume $candados){
        $request['control'] = self::CONTROL_ANTIGUOS;
        $user = Auth::user();
        $resultado = $candados->downCandado($request->all());
        $this->logActividad($user->id,  'RowId:'.$request->all()['rowid'].'|Oficio Baja:'.$request->all()['oficiobaja'].'|Ip:'.$request->getClientIp(),'BAJA CANDADO', $user->direccion_id);
        return $resultado;
    }

    public function setCandadoAntiguo(Request $request,CandadosApiConsume $candados){
        $request['control'] = self::CONTROL_ANTIGUOS;
        $resultado = $candados->defineCandados($request->all());
        $user = Auth::user();
        $this->logActividad($user->id,  'Placa:'.$request->all()['placa'].'|serievh:'.$request->all()['serievh'].'|Oficio'.$request->all()['noficio'].'|cvecandado'.$request->all()['cvecandado'].'|Ip:'.$request->getClientIp(),'BAJA CANDADO', $user->direccion_id);

        return $resultado;
    }
    public function getCandadosAntiguo(Request $request,CandadosApiConsume $candados){
        $request['control'] = self::CONTROL_ANTIGUOS;
        $resultado = $candados->getCandados($request->all());
        $user = Auth::user();
        $this->logActividad($user->id,  'Placa:'.$request->all()['placa'].'|serievh:'.$request->all()['serievh'].'|Ip:'.$request->getClientIp(),'BUSCA CANDADO', $user->direccion_id);

        return $resultado;
    }

}

