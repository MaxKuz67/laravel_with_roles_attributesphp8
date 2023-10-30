<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRequest;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;

class StoreController extends BaseController
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $role = $this->service->store($data);
        return new RoleResource($role);
    }
}
