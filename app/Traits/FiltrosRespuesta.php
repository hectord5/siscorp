<?php


namespace App\Traits;

trait FiltrosRespuesta
{
    function filtroActivas($datos){
        $respuesta_filtrada = array();
        foreach ($datos as $row){
            if ( $row['estatus'] == 'A' || $row['estatus'] == 'P' || $row['estatus'] == 'B')
            $respuesta_filtrada[] = $row;
        }
        return $respuesta_filtrada;
    }
    function filtroTipoControl($datos,$control){
        $respuesta_filtrada = array();
        foreach ($datos as $row){
            if ( $row['control_vh'] == $control || $row['control_vh'] == $control)
                $respuesta_filtrada[] = $row;
        }
        return $respuesta_filtrada;
    }


}

