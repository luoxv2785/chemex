<?php


namespace Response;


use Exception;
use Illuminate\Http\JsonResponse;

class Response
{
    /**
     * 通用的接口返回构造数组
     * @param int $code
     * @param string $message
     * @param array $data
     * @param bool $array
     * @return array
     */
    public static function make(int $code, string $message, array $data = [], bool $array = false)
    {
        $return = [];
        $return['code'] = $code;
        if ($data instanceof Exception) {
            $return['code'] = 500;
            $message = $data->getLine() . ' : ' . $data->getMessage();
            $data = [];
        }
        $return['message'] = $message;
        $return['data'] = $data;

        if ($array) {
            return $return;
        }

        return response()->json($return);
    }
}