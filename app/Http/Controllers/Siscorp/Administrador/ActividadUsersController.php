<?php

namespace App\Http\Controllers\Siscorp\Administrador;

use App\Http\Controllers\Controller;
use App\Models\CatDireccionesModel;
use App\Traits\bitacora;//de una vez
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BitacoraModel;



class ActividadUsersController extends Controller
{
    public function revisaActividad(Request $request){
        $user=Auth::user();
        if($user->direccion_id == 0){
            $bitacoras = bitacoraModel::join('users','users.id','bitacoras.user_id')
                ->join('cat_direcciones','cat_direcciones.id','users.direccion_id')
                ->get();
        }else{
            $bitacoras = bitacoraModel::where('direccion_id',$user->direccion_id)
                ->join('users','users.id','bitacoras.user_id')
                ->join('cat_direcciones','cat_direcciones.id','users.direccion_id')
                ->get();
        }

        return view('administracion_usuarios/actividad_usuarios')->with('bitacoras',$bitacoras);


    }
}
