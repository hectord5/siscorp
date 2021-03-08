<?php

namespace App\Http\Controllers\Siscorp\Candados;

use App\Http\Controllers\Controller;
use App\Services\Consume\SicoveApi\SicoveApiConsume;

class ControlCandadosController extends Controller
{
    public function EligeControl(SicoveApiConsume $sicove){
        $datos_controles = $this->listadoControles($sicove);
        return view('candados.controles')->with('datos_controles',$datos_controles);
    }

}
