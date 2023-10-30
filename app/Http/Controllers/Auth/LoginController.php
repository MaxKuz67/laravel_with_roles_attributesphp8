<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Enums\RStatus;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends BaseController
{

    public function __invoke(LoginRequest $request)
    {

        $credentials = $request->validated();

        if(!$token = auth('api')->attempt($credentials)){
            return $this->sendResponse(status: RStatus::ERROR, message: trans("messages.auth_wrong_credentials"),httpCode: 401);
        }

        return $this->respondWithToken($token);

    }
}
