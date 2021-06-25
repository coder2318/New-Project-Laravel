<?php


namespace App\Http\Mixins;


class ResponseMixins
{
    public function successJson()
    {
        return function($data){
            return [
                'message' => 'Ok',
                'data' => $data,
                'success' => true,
                'status' =>200
            ];
        };
    }

    public function errorJson()
    {
        return function($error, $code, $message = null){
            return [
                'message' => $message?? 'another message',
                'error' => $error,
                'code' => $code
            ];
        };
    }
}
