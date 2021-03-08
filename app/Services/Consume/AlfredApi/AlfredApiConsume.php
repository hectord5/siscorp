<?php


namespace App\Services\Consume\AlfredApi;


use App\Services\Consume\ConsumeServices;
use Illuminate\Support\Facades\Http;

class AlfredApiConsume extends ConsumeServices
{
    private function getUrl(){
        return config('alfred.consume.licenciaCandados.url');
    }
    public function consultaSoapService(){
        $data='<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <BuscaLicenciaxCurp xmlns="SIEL">
      <curp>GOPF300228</curp>
      <tipoLicencia>A</tipoLicencia>
      <usuario_autorizado>l1c3nc14SAdesktop</usuario_autorizado>
    </BuscaLicenciaxCurp>
  </soap:Body>
</soap:Envelope>';
        $data = new \SimpleXMLElement($data);
        $url = $this->getUrl();
        $response = Http::withBody(
            $data, 'text'
        )->post($url);
        if($response->successful()){
            return $response->json();
        }
        return false;
    }
}
