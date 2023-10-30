<?php

namespace App\Http\Controllers;

use App\Services\Role\Service;
use Illuminate\Support\Facades\Config;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function sendResponse($data = [], $message = "", $status = "success", $httpCode = 200){

        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
            ],
            $httpCode,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

    protected function respondWithToken($token){
        return response()->json([
            'access_token' => $token,
            'type' => 'Bearer',
            'expires_in' => Config::get('jwt.ttl') * 60
        ]);
    }

}