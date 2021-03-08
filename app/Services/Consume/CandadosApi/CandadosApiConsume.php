<?php


namespace App\Services\Consume\CandadosApi;


use App\Services\Consume\ConsumeServices;
use Illuminate\Support\Facades\Http;

class CandadosApiConsume extends ConsumeServices
{

    private function getUrl(){
        return config('alfred.consume.candados.url');
    }
    private function getOpcion($op='tipocandados'){
        return config('alfred.consume.candados.opcion.'.$op);
    }
    private function getUrlTaxi($op='tipocandados'){
        return config('alfred.consume.candadosTaxi.url.'.$op);
    }
    private function getOpcionTaxi($op='tipocandados'){
        return config('alfred.consume.candadosTaxi.opcion.'.$op);
    }

    public function consumeListaCandados($datos){
        $url = $this->getUrl().$this->getOpcion();
        $response = Http::post($url, $datos);
        if($response->successful()){
            return $response->json();
        }
        return false;
    }
    public function downCandado($datos){
        $url = $this->getUrl().$this->getOpcion('cancelacandados');
        $response = Http::post($url, $datos);
        if($response->successful()){
            return  $response->json();
        }
        return false;
    }
    public function defineCandados($datos){
        $url = $this->getUrl().$this->getOpcion('insertacandado');
        $response = Http::post($url, $datos);
        if($response->successful()){
            return  $response->json();
        }
        return false;
    }
    public function getCandados($datos){
        $url = $this->getUrl().$this->getOpcion('buscacandados');
        $response = Http::post($url, $datos);
        if($response->successful()){
            return  $response->json();
        }
        return false;
    }

    public function consultaCandadoTaxi($datos){
        $url = $this->getUrlTaxi().$this->getOpcionTaxi('candados');
        $response = Http::post($url, $datos);
        if($response->successful()){
            return  $response->json();
        }
        return false;
    }
    public function insertaCandadoTaxi($datos){
        $url = $this->getUrlTaxi().$this->getOpcionTaxi('insert');
        $response = Http::post($url, $datos);
        if($response->successful()){
            return  $response->json();
        }
        return false;
    }
    public function actualizaCandadoTaxi($datos){
        $url = $this->getUrlTaxi().$this->getOpcionTaxi('update');
        $response = Http::post($url, $datos);
        if($response->successful()){
            return  $response->json();
        }
        return false;
    }

}
