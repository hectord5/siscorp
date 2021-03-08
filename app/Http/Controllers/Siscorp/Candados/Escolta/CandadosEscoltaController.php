<?php

namespace App\Http\Controllers\Siscorp\Candados\Escolta;

use App\Http\Controllers\Controller;
use App\Services\Consume\CandadosApi\CandadosApiConsume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandadosEscoltaController extends Controller
{
    public function indexEscolta(){
        return view('candados.escolta.index');
    }

    public function getListaCandadosParticular(CandadosApiConsume $candados)
    {
        $datos = [
            'control' => self::CONTROL_PARTICULAR
        ];
        $lista = $candados->consumeListaCandados($datos);
        return $lista;
    }
    public function setDownCandadoParticular(Request $request,CandadosApiConsume $candados){
        $request['control'] = self::CONTROL_PARTICULAR;
        $user = Auth::user();
        $resultado = $candados->downCandado($request->all());
        $this->logActividad($user->id,  'RowId:'.$request->all()['rowid'].'|Oficio Baja:'.$request->all()['oficiobaja'].'|Ip:'.$request->getClientIp(),'BAJA CANDADO', $user->direccion_id);
        return $resultado;
    }

    public function setCandadoParticular(Request $request,CandadosApiConsume $candados){
        $request['control'] = self::CONTROL_PARTICULAR;
        $resultado = $candados->defineCandados($request->all());
        $user = Auth::user();
        $this->logActividad($user->id,  'Placa:'.$request->all()['placa'].'|serievh:'.$request->all()['serievh'].'|Oficio'.$request->all()['noficio'].'|cvecandado'.$request->all()['cvecandado'].'|Ip:'.$request->getClientIp(),'BAJA CANDADO', $user->direccion_id);

        return $resultado;
    }
    public function getCandadosParticular(Request $request,CandadosApiConsume $candados){
        $request['control'] = self::CONTROL_PARTICULAR;
        $resultado = $candados->getCandados($request->all());
        $user = Auth::user();
        $this->logActividad($user->id,  'Placa:'.$request->all()['placa'].'|serievh:'.$request->all()['serievh'].'|Ip:'.$request->getClientIp(),'BUSCA CANDADO', $user->direccion_id);

        return $resultado;
    }

}

