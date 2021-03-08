<?php


namespace App\Services\Consume;


class ConsumeServices
{

    protected function error($message){
        return [
            'consumeError' => true,
            'message' => $message
        ];
    }

    protected function response($data,$message){
        return [
            'consumeError' => false,
            'data' => $data,
            'message' => $message
        ];
    }
}
