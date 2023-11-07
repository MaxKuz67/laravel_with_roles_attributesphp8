<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\UpdateRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Services\Role\Service;

class UpdateController extends BaseController
{
    public function __construct()
    {
        parent::__construct(new Service());
    }
    
    public function __invoke(UpdateRequest $request, Role $role) {

        $data = $request->validated();

        $updateRole = $this->service->update($role, $data);

        return new RoleResource($updateRole);
    }
}
