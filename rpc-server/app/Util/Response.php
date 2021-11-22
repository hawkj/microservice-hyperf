<?php

namespace App\Util;
class Response
{
    public static function JsonRpcSuccess(array $data, string $msg = 'success'): array
    {
        return [
            'code' => 200,
            'msg' => $msg,
            'data' => $data
        ];
    }

    public static function JsonRpcError(int $code, string $msg): array
    {
        return [
            'code' => $code,
            'msg' => $msg,
            'data' => []
        ];
    }
}