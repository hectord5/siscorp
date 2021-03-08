<?php


namespace App\Traits;
use App\Models\BitacoraModel;


trait bitacora
{
    function logActividad($usuario, $consulta, $tipo_consulta, $direccion_id = 0){
        $datos = array('user_id' => $usuario, 'consulta'=> $consulta, 'tipo_consulta'=> $tipo_consulta, 'direccion_id' => $direccion_id);
        BitacoraModel::create($datos);

    }

}

