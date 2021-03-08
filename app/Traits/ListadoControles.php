<?php
namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait ListadoControles
{

    function listadoControles( $sicove ){
        $arreglo_controles = array('gris','verde','moto','antiguo','remolque','taxi','ruta','escolta','especial','disca');
        $user = Auth::user();
        $controles = $sicove->getListaControles();
        $admin_user = false;
        foreach ($user->roles as $rol){
            if( $user->hasRole('admin') || $user->hasRole('sistemas') ){
                $admin_user = true;
                $iconos = $this->getIconsControlesAdmin();
                $background = $this->getBackgroundControlesAdmin();
                $vista = $this->getVistasControlesAdmin();
                break;
            }elseif (in_array($rol->name,$arreglo_controles)){
                $iconos[$rol->name] = $this->getIconsControles($rol->name);
                $background[$rol->name] = $this->getBackgroundControles($rol->name);
                $vista[$rol->name] = $this->getVistasControles($rol->name);
            }else{
                continue;
            }
        }
//dd($iconos,$background,$vista);

        $datos = $this->filtrarPorRolControles($controles,$iconos,$background,$vista,$admin_user,$user );
        return $datos;
    }
    function filtrarPorRolControles($controles,$iconos,$background,$vista,$admin = false,$user = null ){
        foreach ($controles['data'] as $i => $v){
            $v = strtolower($v);
            if($v == 'publico, privado')$v = 'taxi';
            if($v == 'microbus, combi')$v = 'ruta';
            if($v == 'discapacidad')$v = 'disca';
            if($admin){
                $datos[$i]['control'] = strtoupper($v);
                $datos[$i]['vista'] = $vista[$v];
                $datos[$i]['background'] = $background[$v];
                $datos[$i]['iconos'] = $iconos[$v];
            }else{
                if($user->hasRole($v)){
                    $datos[$i]['control'] = strtoupper($v);
                    $datos[$i]['vista'] = $vista[$v];
                    $datos[$i]['background'] = $background[$v];
                    $datos[$i]['iconos'] = $iconos[$v];
                }
            }
        }
        return $datos;
    }

    function getIconsControles($id){
        $iconos = array(
            'gris'=>'fas fa-car',
            'verde'=>'fas fa-car-side',
            'moto'=>'fas fa-motorcycle ',
            'antiguo'=>'fas fa-car',
            'remolque'=>'fas fa-trailer',
            'taxi'=>'fas fa-taxi',
            'ruta'=>'fas fa-bus',
            'escolta'=>'fas fa-shield-alt',
            'especial'=>'fas fa-star',
            'disca'=>'fas fa-wheelchair'
        );
        return $iconos[$id];
    }

    function getBackgroundControles($id){
        $background=array(
            'gris'=>'bg-gradient-secondary',
            'verde'=>'bg-gradient-success',
            'moto'=>'bg-gradient-info',
            'antiguo'=>'bg-gradient-danger',
            'remolque'=>'bg-gradient-warning',
            'taxi'=>'bg-gradient-pink',
            'ruta'=>'bg-gradient-orange',
            'escolta'=>'bg-gradient-dark',
            'especial'=>'bg-gradient-navy',
            'disca'=>'bg-gradient-primary'
        );
        return $background[$id];
    }
    function getVistasControles($id){
        $vista = array(
            'gris'=>'Gris/1',
            'verde'=>'Verde/2',
            'moto'=>'Moto/3',
            'antiguo'=>'Antiguo/4',
            'remolque'=>'Remolque/5',
            'taxi'=>'Taxi/6',
            'ruta'=>'Ruta/7',
            'escolta'=>'Escolta/8',
            'especial'=>'Especial/9',
            'disca'=>'Discapacidad/10'
        );
        return $vista[$id];
    }
    function getIconsControlesAdmin(){
        $iconos = array(
            'gris'=>'fas fa-car',
            'verde'=>'fas fa-car-side',
            'moto'=>'fas fa-motorcycle ',
            'antiguo'=>'fas fa-car',
            'remolque'=>'fas fa-trailer',
            'taxi'=>'fas fa-taxi',
            'ruta'=>'fas fa-bus',
            'escolta'=>'fas fa-shield-alt',
            'especial'=>'fas fa-star',
            'disca'=>'fas fa-wheelchair'
        );
        return $iconos;
    }

    function getBackgroundControlesAdmin(){
        $background=array(
            'gris'=>'bg-gradient-secondary',
            'verde'=>'bg-gradient-success',
            'moto'=>'bg-gradient-info',
            'antiguo'=>'bg-gradient-danger',
            'remolque'=>'bg-gradient-warning',
            'taxi'=>'bg-gradient-pink',
            'ruta'=>'bg-gradient-orange',
            'escolta'=>'bg-gradient-dark',
            'especial'=>'bg-gradient-navy',
            'disca'=>'bg-gradient-primary'
        );
        return $background;
    }
    function getVistasControlesAdmin(){
        $vista = array(
            'gris'=>'Gris/1',
            'verde'=>'Verde/2',
            'moto'=>'Moto/3',
            'antiguo'=>'Antiguo/4',
            'remolque'=>'Remolque/5',
            'taxi'=>'Taxi/6',
            'ruta'=>'Ruta/7',
            'escolta'=>'Escolta/8',
            'especial'=>'Especial/9',
            'disca'=>'Discapacidad/10'
        );
        return $vista;
    }
}

