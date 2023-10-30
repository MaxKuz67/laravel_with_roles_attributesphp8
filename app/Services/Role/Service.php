<?php

namespace App\Services\Role;

use App\Models\Role;

class Service
{
    public function store($data){
        return Role::create($data);
    }

    public function update($role, $data){

        $role->update($data);

        return $role->fresh();
    }
}