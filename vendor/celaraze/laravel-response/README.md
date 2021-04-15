# Laravel Response

#### 介绍

Laravel 虽然有自带的 `response()` 辅助函数，如果接口数量过多的话，每次都需要定义返回体的格式，Laravel 可以自定义返回体样式，但是需要对控制器的继承做修改。

这是一个帮助构造返回体的辅助包：

原来的做法：

```php
public function user(){
    $user = User::all();
    return response()->json([
        'code'=> 200,
        'message'=>'get successfully.',
        'data'=>$user
]);
}
```

优化后的做法：

```php
public function user(){
    $user = User::all();
    return Response::make(200, 'get successfully.', $user); // 直接返回JsonResponse体
    return Response::make(200, 'get successfully.', $user, true); // 返回数组格式
}
```

同时，如果传入的 data 是 Exception 类型，则会自动转化为异常捕获输出。

#### 安装

仅支持 Laravel 8 + 以及 PHP 8 +

```composer require celaraze/laravel-response```

#### 参与贡献

1. Fork 本仓库
2. 新建 Feat_xxx 分支
3. 提交代码
4. 新建 Pull Request

#### 开源协议

Laravel Response 遵循 MIT 开源协议。