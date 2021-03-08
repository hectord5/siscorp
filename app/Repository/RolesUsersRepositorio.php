<?php


namespace App\Repository;

use App\Models\RolesUsersModel;
use Illuminate\Support\Facades\DB;

class RolesUsersRepositorio extends Repositorio
{
    function model()
    {
        return RolesUsersModel::class;
    }
    function actualizaUR(array $data, $id, $attribute = "id"){
        return $this->model->where($attribute, '=', $id)->update($data);
    }
    function creaUR(array $data){
        return $this->model->create($data);
    }

    function BorrarRolesActuales($id){
        return $this->model->where('user_id', '=', $id)->delete();
    }

}
