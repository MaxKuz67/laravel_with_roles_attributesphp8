<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LogoutController extends BaseController
{
    public function __invoke()
    {
        auth('api')->logout();

        return $this->sendResponse(message: trans("messages.auth_logout_success"));

    }
}
