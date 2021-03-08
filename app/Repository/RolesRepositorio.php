<?php


namespace App\Repository;

use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RolesRepositorio extends Repositorio
{
    function model()
    {
        return Role::class;
    }
    function actualizaR(array $data, $id, $attribute = "id"){
        return $this->model->where($attribute, '=', $id)->update($data);
    }
    function creaR(array $data){
        return $this->model->create($data);
    }
    function eliminaR($id){
        return $this->model->where('id', '=', $id)->delete();
    }
    function getAll(){
        return $this->model->where('name','!=','sistemas')->where('name','!=','admin')->get();
    }
}
