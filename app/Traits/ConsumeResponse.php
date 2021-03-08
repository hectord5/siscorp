<?php


namespace App\Traits;


trait ConsumeResponse
{
    protected function successResponseConsume($data){
        $response['success'] = true;
        $response['data'] = $data;
        return $response;
    }

    protected function errorResponseConsume($message,$code = 500){
        $response['success'] = false;
        $response['error_code'] = $code;
        $response['error'] = $message;
        return $response;
    }

    protected function clienteResponse($response){
        if($response->successful()) {
            return $this->successResponseConsume($response->json());
        }

        return $this->errorResponseConsume($response->json() ?? null,$response->status());
    }

    protected function clienteResponseData($response){
        if($response->successful()) {
            return $this->successResponseConsume($response->json()['data']);
        }

        return $this->errorResponseConsume($response->json()['data'] ?? null,$response->status());
    }

    protected function clienteResponseDataPag($response){
        if($response->successful()) {
            return $this->successResponseConsume($response->json()['data']['data']);
        }

        return $this->errorResponseConsume($response->json()['data'] ?? null,$response->status());
    }
}
