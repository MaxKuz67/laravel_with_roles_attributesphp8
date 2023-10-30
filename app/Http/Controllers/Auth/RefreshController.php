<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;

class RefreshController extends BaseController
{
    public function __invoke()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }
}
