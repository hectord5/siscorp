<?php


namespace App\Services\Consume\Oracle;


use App\Services\Consume\ConsumeServices;
use Illuminate\Support\Facades\Http;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class ServiceCsharpConsume extends ConsumeServices
{
    private function getUsername(){
        return config('alfred.consume.licenciaCurp.username');
    }
    private function getPassword(){
        return config('alfred.consume.licenciaCurp.password');
    }

    private function getUrl(){
        return config('alfred.consume.licenciaCurp.url');
    }


    public function getLicenciasCurp($data){
        $path='consultalicenciacurp';
        $response = $this->postLicencia($data,$path);
        if($response->successful()){
            $response = $response->json();
            return $this->response($response,'ok');
        }
        return false;
    }

    public function getLicenciasFolio($data){
        $path='consultalicenciafolio';
        $response = $this->postLicencia($data,$path);

        if($response->successful()){
            $response = $response->json();
            return $this->response($response,'ok');
        }
        return false;
    }


    public  function postLicencia($data,$path){
        $url = $this->getUrl().$path;
        $request = Http::withBasicAuth($this->getUsername(),$this->getPassword())->post($url,$data);
        return $request;
    }

    public  function getStatus(){
        $url = $this->getUrl().'statussicove';
        $response = Http::withBasicAuth($this->getUsername(),$this->getPassword())->get($url);
        if($response->successful()){
            $response = $response->json();
            return $this->response($response,'ok');
        }
        return false;
    }

    public function consumeResumenCandados($data){
        $path='verificacandadoslicencias';
        $response = $this->postLicencia($data,$path);
        if($response->successful()){
            $response = $response->json();
            return $this->response($response,'ok');
        }
        return false;
    }

    public function consumeConsultaLc($data){
        $path='verificalineacaptura';
        $response = $this->postLicencia($data,$path);
        if($response->successful()){
            $response = $response->json();
            return $this->response($response,'ok');
        }
        return false;
    }

    public function consumeStatus($data){
        $path='statussicove';
        $response = $this->getStatus($data,$path);
        if($response->successful()){
            $response = $response->json();
            return $this->response($response,'ok');
        }
        return false;
    }

}
