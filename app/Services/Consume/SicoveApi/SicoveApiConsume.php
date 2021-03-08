<?php


namespace App\Services\Consume\SicoveApi;


use App\Services\Consume\ConsumeServices;
use Illuminate\Support\Facades\Http;

class SicoveApiConsume extends ConsumeServices
{
    private function getUsername(){
        return config('alfred.consume.sicove.username');
    }
    private function getPassword(){
        return config('alfred.consume.sicove.password');
    }

    private function getUrl(){
        return config('alfred.consume.sicove.url');
    }

    public function consumeResumenPorEmpresa($campo,$valor, $tipo_control=1){
        $atr = ($campo == 'rfc')?'rfc':'razon_social';
        $response = $this->solicitudUrl('/v1/tramite?de=resumen&op=like&re=all&ciudadano['.$atr.']='.$valor.'&cat_tipo_movimiento[id_control_vh]='.$tipo_control);
        if($response->successful()){
            $response = $response->json();
            if(isset($response['data']) and count($response['data']) > 0)
                return $this->response($response['data'],'ok');

            return $this->error('NO se encontro');
        }
        return false;
    }

    public function consumeResumenPorCiudadano($campo,$valor, $tipo_control=1){
        if(is_array($valor)){
            $query = $this->creaUrl($valor);
        }else{
            $query = '&ciudadano[curp]='.$valor;
        }
        $response = $this->solicitudUrl('/v1/tramite?de=resumen&re=all'.$query.'&cat_tipo_movimiento[id_control_vh]='.$tipo_control);
        if($response->successful()){
            $response = $response->json();
            if(isset($response['data']) and count($response['data']) > 0)
                return $this->response($response['data'],'ok');
            return $this->error('NO se encontro');
        }
        return false;
    }

    public function consumeHistorialPorVehiculo($campo,$valor, $tipo_control=1){
        $atr = ($campo == 'serie_vh')?'serie_vh':'placa';
        $tabla = ($campo == 'serie_vh')?'vehiculo':'tramite';
        $response = $this->solicitudUrl('/v1/tramite?de=resumen&re=all&'.$tabla.'['.$atr.']='.$valor.'&cat_tipo_movimiento[id_control_vh]='.$tipo_control);
        if($response->successful()){
            $response = $response->json();
            if(isset($response['data']) and count($response['data']) > 0)
                return $this->response($response['data'],'ok');

            return $this->error('NO se encontro');
        }
        return false;
    }

    public function consumeResumenLicencia($valor, $tipo_control ){
        $atr = 'placa';
        $tabla = 'tramite';

        $response = $this->solicitudUrl('/v1/tramite?de=resumen&re=all&'.$tabla.'['.$atr.']='.$valor.'&cat_tipo_movimiento[id_control_vh]='.$tipo_control );
        if($response->successful()){
            $response = $response->json();
            if(isset($response['data']) and count($response['data']) > 0)
                return $this->response($response['data'],'ok');

            return $this->error('NO se encontro');
        }
        return false;
    }

    public function consumeResumenPorVehiculo($campo,$valor, $tipo_control=1){
        $atr = ($campo == 'serie_vh')?'serie_vh':'placa';
        $tabla = ($campo == 'serie_vh')?'vehiculo':'tramite';
        $response = $this->solicitudUrl('/v1/tramite?de=resumen&re=all&'.$tabla.'['.$atr.']='.$valor.'&cat_tipo_movimiento[id_control_vh]='.$tipo_control);
        if($response->successful()){
            $response = $response->json();
            if(isset($response['data']) and count($response['data']) > 0)
                return $this->response($response['data'],'ok');

            return $this->error('NO se encontro');
        }
        return false;
    }

    public function consumeResumenLC($lc){
        $url = $this->getUrl().'/v1/tramite?de=resumen&tramite[linea_captura]='.$lc;
        $response = Http::withBasicAuth($this->getUsername(),$this->getPassword())->get($url);
        if($response->successful()){
            $response = $response->json();
            if(isset($response['data']) and count($response['data']) > 0)
                return $this->response($response['data'],'ok');

            return $this->error('NO se encontro');
        }else{
            return $response->json();
        }
        return false;
    }

    public function consumeDatosLC($lc){
        $url = $this->getUrl().'/v1/consume/linea/'.$lc;
        $response = Http::withBasicAuth($this->getUsername(),$this->getPassword())->get($url);
        if($response->successful()){
            $response = $response->json();
            if(isset($response['data']) and count($response['data']) > 0)
                return $this->response($response['data'],'ok');

            return $this->error('NO se encontro');
        }

    }

    public function consumeTramiteLC($lc){
        dd($url);
        $url = $this->getUrl().'/v1/tramite?lineaCaptura='.$lc;
        $response = Http::withBasicAuth($this->getUsername(),$this->getPassword())->get($url);
        if($response->successful()){
            $response = $response->json();
//            dd($response);
            if(isset($response['data']) and count($response['data']) > 0)
                return $this->response($response['data'],'ok');

            return $this->error('NO se encontro');
        }

    }

    public function getListaControles(){
        $controles=array();
        $response = $this->solicitudUrl('/v1/cat/controlesVehiculares');
        if($response->successful()){
            $response = $response->json();
            if(isset($response['data']) and count($response['data']) > 0){
                foreach ($response['data'] as $control){
                    if ($control['numeroControlVehicular'] <= 10){
                        $controles[$control["numeroControlVehicular"]] = $control['descripcion'];
                    }
                }
                return $this->response($controles,'ok');
            }
            return $this->error('NO se encontro');
        }
        return false;
    }

    public function getLicencias($url,$curp){
        $controles=array();
        $response = $this->solicitudUrl($url);
        if($response->successful()){
            $response = $response->json();
            if(isset($response['data']) and count($response['data']) > 0){
                foreach ($response['data'] as $control){
                    $controles[$control["numeroControlVehicular"]] = $control['descripcion'];
                }
                return $this->response($controles,'ok');
            }
            return $this->error('NO se encontro');
        }
        return false;
    }
    public function getCatTipoVH($id){
        $controles=array();
        $response = $this->solicitudUrl('/v1/cat/claseTipoVehiculo?claveClase=1&claveTipo='.$id);
        if($response->successful()){
            $response = $response->json();
            if(isset($response['data']) and count($response['data']) > 0){
                foreach ($response['data'] as $control){
                    $controles[$control["numeroControlVehicular"]] = $control['descripcion'];
                }
                return $this->response($controles,'ok');
            }
            return $this->error('NO se encontro');
        }
        return false;
    }


    public  function solicitudUrl($url, $attr=''){
        $url = $this->getUrl().$url.$attr;
        $response = Http::withBasicAuth($this->getUsername(),$this->getPassword())->get($url);
        return $response;
    }
    public function creaUrl($valor){
        if( $valor['nombre'] !== null && $valor['paterno'] !== null && $valor['materno'] !== null){
            $query='&ciudadano[nombre]='.$valor['nombre'].'&ciudadano[paterno]='.$valor['paterno'].'&ciudadano[materno]='.$valor['materno'];
        }elseif( $valor['nombre'] === null && $valor['materno'] !== null){
            $query='&ciudadano[paterno]='.$valor['paterno'].'&ciudadano[materno]='.$valor['materno'];
        }elseif( $valor['nombre'] === null && $valor['materno'] === null){
            $query='&ciudadano[paterno]='.$valor['paterno'];
        }elseif( $valor['paterno'] === null && $valor['materno'] !== null){
            $query='&ciudadano[nombre]='.$valor['nombre'].'&ciudadano[materno]='.$valor['materno'];
        }elseif( $valor['paterno'] === null && $valor['materno'] === null){
            $query='&ciudadano[nombre]='.$valor['nombre'];
        }elseif( $valor['nombre'] !== null && $valor['paterno'] !== null && $valor['materno'] === null){
            $query='&ciudadano[nombre]='.$valor['nombre'].'&ciudadano[paterno]='.$valor['paterno'];
        }
        return $query;
    }

    public  function consumeResumenAdeudosPorPlaca($placa){
        $url = 'https://tramites.cdmx.gob.mx/fotocivicas/public/api/consultar-infracciones/'.$placa;
        $response = Http::get($url);
        if($response->successful()){
            $response = $response->json();
            if(isset($response) and count($response) > 0)
                return $this->response($response,'ok');

            return $this->error('NO se encontro');
        }

        return false;
    }
    public function consumeResumenPorPlaca($campo,$valor,$re_all=''){
        $atr = ($campo == 'serie_vh')?'serie_vh':'placa';
        $tabla = ($campo == 'serie_vh')?'vehiculo':'tramite';
        $response = $this->solicitudUrl('/v1/tramite?de=resumen&'.$tabla.'['.$atr.']='.$valor.$re_all);
        if($response->successful()){
            $response = $response->json();
            if(isset($response['data']) and count($response['data']) > 0)
                return $this->response($response['data'],'ok');

            return $this->error('NO se encontro');
        }
        return false;

    }

    public function getCurpRenapo($curp){
        $response = $this->solicitudUrl('/v1/consume/curp/'.$curp);
        if($response->successful()){
            $response = $response->json();
            if(isset($response['data']) and count($response['data']) > 0)
                return $this->response($response['data'],'ok');

            return $this->error('NO se encontro');
        }
        return false;
    }

}
