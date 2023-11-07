<?php

namespace App\Http\Middleware;

use App\Attributes\Access;
use App\Http\Controllers\Role\IndexController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use ReflectionClass;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        $controller = Route::current()?->controller;
        if($controller) {
            $reflectionClass = new ReflectionClass($controller);

            $attributes = $reflectionClass->getAttributes(Access::class);

            if (count($attributes) > 0) {

                foreach ($reflectionClass->getAttributes(Access::class) as $attribute) {
                    $instance = $attribute->newInstance();

                    $roles = $instance->roles;
                    $permissions = $instance->permissions;

                    $accessStatus = (count($roles) == 0 && count($permissions) == 0) ? true : false;

                    if (count($roles) > 0) {
                        foreach ($roles as $role) {
                            if (auth("api")->user()->hasRole($role)) {
                                $accessStatus = true;
                                break;
                            }
                        }
                    }

                    if (count($permissions) > 0) {
                        foreach ($permissions as $permission) {
                            if (auth("api")->user()->hasPermission($permission)) {
                                $accessStatus = true;
                                break;
                            }
                        }
                    }


                    if (!$accessStatus) {
                        return response()->json([
                            'status' => "error",
                            'message' => "Нет прав!",
                            'data' => "",
                        ],
                            403,
                            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
                            JSON_UNESCAPED_UNICODE);
                    }
                }
            }
        }

        return $next($request);
    }


}
