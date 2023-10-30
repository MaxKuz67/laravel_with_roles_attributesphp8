<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(Role $role) {
        return new RoleResource($role);
    }
}
