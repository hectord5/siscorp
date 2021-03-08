<?php

namespace App\Traits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait GestionRoles
{
    function guardarRol($request){
        $this->RolesRepo()->creaR(array('name' =>$request['nombre'],'description' =>$request['descripcion']));
        $respuesta = $this->errors("success","Se guardo el rol: " . $request['nombre'],now());
        return $respuesta;
    }
    public function errors($code,$msg,$date){

        $data['errCode']=$code;
        $data['errMsg']=$msg;
        $data['errDate']=$date;
        return$data;
    }
    public function EliminarRol($id){
        $this->RolesRepo()->eliminaR($id);
    }
}
