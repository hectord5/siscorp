<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsuariosRepositorio extends Repositorio
{
    function model()
    {
        return User::class;
    }

    function actualizaU(array $data, $id, $attribute = "id"){
        return $this->model->where($attribute, '=', $id)->update($data);
    }
    function creaU(array $data){
        return $this->model->create($data);
    }
    function getAllByDireccion($dir_id){
        return $this->model->where('direccion_id',$dir_id)->get();
    }
}
