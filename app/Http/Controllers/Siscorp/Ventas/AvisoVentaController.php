<?php

namespace App\Http\Controllers\Siscorp\Ventas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvisoVentaController extends Controller
{
    public function BuscaAviso(){
        return view('Ventas.busca_aviso');
    }

    public function PreviaAviso(Request $request){

    }
}
