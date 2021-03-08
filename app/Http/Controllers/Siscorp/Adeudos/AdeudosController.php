<?php

namespace App\Http\Controllers\Siscorp\Adeudos;

use App\Http\Controllers\Controller;
use App\Services\Consume\SicoveApi\SicoveApiConsume;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdeudosController extends Controller
{
    public function AdeudosBuscar(){
        return view('adeudos.busca-por-placa')->with('ruta','getInfoToAdeudo');
    }

    public function getInfoToAdeudo(Request $request, SicoveApiConsume $sicove)
    {
        $respuesta = $sicove->consumeResumenAdeudosPorPlaca($request->placa);
        return view('adeudos.resultados-adeudos-por-placa')->with('respuesta', $respuesta['data']);
    }
    public function imprimeHistorial(Request $request){
        $respuesta =(array)json_decode($request->datos_adeudos);
        $user = Auth::user();

        $respuesta['adeudo_fotocivicas'] = (array)$respuesta['adeudo_fotocivicas'];
        $respuesta['economicas'] = (array)$respuesta['economicas'];
        if (count($respuesta['economicas'])!= 0){
            foreach ($respuesta['economicas'] as $indice => $dato){
                $respuesta['economicas'][$indice] = (array)$dato;
            }
        }

        $respuesta['sanciones'] = (array)$respuesta['sanciones'];
        if (count($respuesta['sanciones'])!= 0){
            foreach ($respuesta['sanciones'] as $indice => $dato){
                $respuesta['sanciones'][$indice] = (array)$dato;
            }
        }
        $respuesta['tenencias'] = (array)$respuesta['tenencias'];
        $layout = 'adeudos.pdf.pdf-resultados-adeudos-por-placa';
        $pdf = PDF::loadView($layout, compact('respuesta'));
        $this->logActividad($user->id, 'CONSULTA DE ADEUDOS.', 'BUSQUEDA CON LA PLACA:'.$respuesta['placa'], $user->direccion_id);

        $nombre_pdf = 'Reporte_SISCORP_'.$respuesta['placa'].'.pdf';

        return $pdf->stream($nombre_pdf);

    }
}

