<?php

namespace Celaraze\DcatRoutes\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use ReflectionClass;

class MiddleInject
{
    public function handle(Request $request, Closure $next)
    {
        $content = file_get_contents(admin_path('routes.php'));
        preg_match_all("/^(.*resource\(.*)$/mi", $content, $results);
        $routes = $results[1];
        foreach ($routes as $route) {
            $controller = explode(',', $route)[1];
            $controller = substr($controller, strlen("'") + strpos($controller, "'"), (strlen($controller) - strpos($controller, ")")) * (-1));
            $controller = str_replace("'", '', $controller);
            $namespace = config('admin.route.namespace');
            $controller = $namespace . '\\' . $controller;
            $controller = new ReflectionClass($controller);
            $repository = $controller->getAttributes('DcatRoutes')[0]->getArguments()[0];
            $repository = new $repository();
            $model = $repository->model();

            $attributes = [
                'prefix' => 'api',
                'middleware' => 'api',
            ];
            app('router')->group($attributes, function ($router) {
                $router->resource();
            });
        }

        return $next($request);
    }
}
