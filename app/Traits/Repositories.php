<?php
namespace App\Traits;

use App\Repository\RolesRepositorio;
use App\Repository\RolesUsersRepositorio;
use App\Repository\UsuariosRepositorio;
use Illuminate\Container\Container;

trait Repositories
{
    protected function UsuariosRepo(){
        return new UsuariosRepositorio(Container::getInstance());
    }
    protected function RolesRepo(){
        return new RolesRepositorio(Container::getInstance());
    }
    protected function RolesUsuariosRepo(){
        return new RolesUsersRepositorio(Container::getInstance());
    }
}
