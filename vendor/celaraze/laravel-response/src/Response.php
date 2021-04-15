<?php


namespace Celaraze;


use Exception;
use Illuminate\Http\JsonResponse;
use JetBrains\PhpStorm\ArrayShape;

class Response
{
    /**
     * 通用的接口返回构造数组.
     * @param int $code
     * @param string $message
     * @param array $data
     * @param bool $array
     * @return array|JsonResponse
     */
    #[ArrayShape(['code' => "integer", 'message' => "string", "data" => "mixed"])]
    public static function make(int $code, string $message, array $data = [], bool $array = false): JsonResponse|array
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