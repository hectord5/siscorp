<?php

namespace App\Traits;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

trait ResponseErrors
{
    protected function successResponse($data, $code)
    {
        return response()->json(['data' => $data, 'code' => $code], $code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    // Respuesta sin errores
    protected function response($data,$msg = ''){
        $response['error']=false;
        $response['data']=$data;
        $response['message']=$msg;
        return $response;
    }

    // Respuesta con errores
    protected function errors($msg = ''){
        $response['error']=true;
        $response['message']=$msg;
        return $response;
    }

    // repsuesta con datos
    // Respuesta con errores
    protected function errorsData($msg = '',$data){
        $response['error']=true;
        $response['message']=$msg;
        $response['data']=$data;
        return $response;
    }
}
