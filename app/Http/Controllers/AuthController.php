<?php

namespace App\Http\Controllers;

use Celaraze\Response;
use Illuminate\Http\JsonResponse;
use JetBrains\PhpStorm\ArrayShape;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['login']]);
    }

    /**
     * 登录.
     *
     * @return JsonResponse
     */
    #[ArrayShape(['code' => "int", 'message' => "string", "data" => "mixed"])]
    public function login(): JsonResponse
    {
        $credentials = request(['username', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return Response::make(401, '未授权的操作');
        }

        return $this->respondWithToken($token);
    }

    /**
     * 返回Token.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    #[ArrayShape(['code' => "int", 'message' => "string", "data" => "mixed"])]
    protected function respondWithToken(string $token): JsonResponse
    {
        $token = [
            'access_token' => $token,
            'token_type' => 'bearer',
        ];
        return Response::make(200, 'successfully', $token);
    }

    /**
     * 获取登录的用户信息.
     *
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        return response()->json(auth('api')->user());
    }

    /**
     * 注销
     *
     * @return JsonResponse
     */
    #[ArrayShape(['code' => "int", 'message' => "string", "data" => "mixed"])]
    public function logout(): JsonResponse
    {
        auth('api')->logout();

        return Response::make(200, '成功登出');
    }

    /**
     * 刷新token，如果开启黑名单，以前的token便会失效。
     * 值得注意的是用上面的getToken再获取一次Token并不算做刷新，两次获得的Token是并行的，即两个都可用。
     *
     * @return JsonResponse
     */
    #[ArrayShape(['code' => "int", 'message' => "string", "data" => "mixed"])]
    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth('api')->refresh());
    }
}
