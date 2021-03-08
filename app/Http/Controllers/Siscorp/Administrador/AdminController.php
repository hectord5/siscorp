<?php

namespace App\Http\Controllers\Siscorp\Administrador;

use App\Http\Controllers\Controller;
use App\Models\CatDireccionesModel;
use App\Models\User;
use App\Services\Consume\SicoveApi\SicoveApiConsume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function AdminUsuario(){
        $user = Auth::user();
    if($user->direccion_id === 0){
        $usuarios = $this->UsuariosRepo()->all();
        $direcciones = CatDireccionesModel::all();
        $roles = $this->RolesRepo()->all();
    }else{
        $roles = $this->RolesRepo()->getAll();
        $usuarios = $this->UsuariosRepo()->getAllByDireccion($user->direccion_id);
        $direcciones = CatDireccionesModel::where('id',$user->direccion_id);
    }

        $roles_usuario = $this->RolesUsuariosRepo()->all();

        return view('administracion_usuarios.administracion_usuarios')
            ->with('usuarios', $usuarios)
            ->with('user', $user)
            ->with('direcciones', $direcciones)
            ->with('roles_usuario', $roles_usuario)
            ->with('roles', $roles);
    }

    function ActualizarUsuario(Request $request,SicoveApiConsume $sicoveApiConsume){
//        $curp=$sicoveApiConsume->getCurpRenapo($request->username);
        if(isset($request->descripcion)){
            $respuesta = $this->guardarRol($request->all());
        }else {
            $respuesta = $this->guardarUsuario($request);
        }
        return redirect()->route('AdminUsers')->withErrors($respuesta['errMsg']);
    }
    function HabilitaDeshabilitaUser(Request $request){
        $datos['estatus'] = ($request->opcion_ad == 'HABILITADO')? 'B': 'A';
        $this->desAbiUsuario($datos, $request->user_id);
        $respuesta = $this->errors("success","Se guardaron los cambios del usuario: ",now());
        return redirect()->route('AdminUsers')->withErrors($respuesta['errMsg']);
    }

    public function EliminarRole(Request $request){
        $this->EliminarRol($request->role_id);
        $respuesta = $this->errors("success","Se guardaron los cambios del usuario: ",now());
        return redirect()->route('AdminUsers')->withErrors($respuesta['errMsg']);
    }

    public function updatePassword()
    {
        $user = Auth::user();
        return view('update.password')->with('user',$user);
    }

    public function actualizaContraseña(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;
        User::where('id',$id)->first()->update(array('password'=>bcrypt($request['password']),'password_update'=>'A'));
        return redirect()->route('home');
    }
    public function restablecerContraseña(Request $request)
    {
        $id = $request->user_id_restablece;
        User::where('id',$id)->first()->update(array('password'=>bcrypt('1234abcd'),'password_update'=>'P'));
        return redirect()->route('AdminUsers');
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function PanelAdmin(){
        return view('administracion_usuarios.adminBeta.panelAdmin');
    }

    public function NuevaDireccion(Request $request)
    {
        CatDireccionesModel::create( ['texto' => $request['nombre_dir']]);
        return redirect()->route('AdminUsers');

    }
}
