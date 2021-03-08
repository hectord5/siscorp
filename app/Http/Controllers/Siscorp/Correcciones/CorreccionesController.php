<?php

namespace App\Http\Controllers\Siscorp\Correcciones;

use App\Http\Controllers\Controller;
use App\Services\Consume\SicoveApi\SicoveApiConsume;
use Illuminate\Http\Request;

class CorreccionesController extends Controller
{
    public function ControlCorrecciones(){
        return view('correcciones.busca')->with('ruta','getInfoToCorregir')->with('tipo_control',1);
    }

    public function getInfoToCorregir(Request $request, SicoveApiConsume $sicove)
    {
        $respuesta = $sicove->consumeResumenPorEmpresa($request->campo, $request->valor, $request->tipo_control);
        if (!$respuesta || (isset($respuesta['data']) && $respuesta['data'] == false)) {
            return view('sabanas.Empresa.busca')->with('tipo_control', $request->tipo_control)->with('ruta', 'sabanas.buscar.empresa.gris')
                ->withErrors('No se encontraron resultados con los parametros de busqueda');
        }
    }
}

