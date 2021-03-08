<?php

namespace App\Traits;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait GestionUsuarios
{
    function desAbiUsuario($datos,$id_user){
        $this->UsuariosRepo()->actualizaU($datos, $id_user, 'id');
    }
    function guardarUsuario($request){
//        dd($request['name']);
//        $datos_roles = explode(',',substr(str_replace('|',',',str_replace('elem_rol_','|',$request->roles_usuario)),0,-1));
        $datos_roles = explode('elem_rol_',$request->roles_usuario);
        unset($datos_roles[0]);//se elimina el primer elemento por estar vacio
        $datos = array(
            "name" => $request->name,
            "email" => $request->EMAIL,
            "username" => strtoupper($request->username),
            "direccion_id" => $request->direccion_id
        );
        try {
            if (isset($request->id_user) && $request->id_user != null) {

                if ($request->PASS != null) {
                    $hashedPassword = bcrypt($request->PASS);
                    $datos['password'] = $hashedPassword;
                }else{
                    $usuario = $this->UsuariosRepo()->find($request->id_user);
                    $datos['password'] = $usuario['password'];
                }
                User::where('id',$request->id_user)->update($datos);
                $usuario = User::where('id',$request->id_user)->first();
                $usuario->roles()->sync($datos_roles);
            } else {
                $datos['estatus'] = 'A';
                $datos['password_update'] = 'P';
                $hashedPassword = bcrypt('1234abcd');
                $datos['password'] = $hashedPassword;
                $user = $this->UsuariosRepo()->creaU($datos);
                $usuario = User::where('id',$user->id)->first();
                $usuario->roles()->sync($datos_roles);
            }
            $respuesta = $this->errors("success","Se guardaron los cambios del usuario: " . $request->name,now());
            return $respuesta;
        } catch (\Exception $e) {
//            dd($e->getMessage());
            var_dump('esta duplicando algun campo, revisar que los datos no se encuentren ya en el sistema');
            $respuesta = $this->errors("error",$e->getMessage(),now());
            return redirect()->route('AdminUsers')->withErrors($respuesta);
        }
    }
}
