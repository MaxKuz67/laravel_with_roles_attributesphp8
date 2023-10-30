<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

#[\App\Attributes\Access(roles: ["admin"])]
class IndexController extends BaseController
{
    public function __invoke(Request $request)
    {
        return RoleResource::collection(Role::all());
    }
}
