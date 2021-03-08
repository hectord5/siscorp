<?php


namespace App\Services\Revista;


use Illuminate\Support\Facades\Log;

class ValidationRevista
{
    public function validarBusqueda($responses){
        try{
            $errors = array();

            foreach ($responses as $response){
                if($response['error'] === true){
                    array_push($errors,$response['message']);
                }
            }

            return $errors;

        }catch (\Exception $exception) {
            Log::error('VALIDACION BUSQUEDA:'.$exception->getMessage());
            return ['Error al validar datos'];
        }
    }
}
