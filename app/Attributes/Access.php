<?php

namespace App\Attributes;

use Attribute;

#[Attribute]
class Access
{
    public array $roles;
    public array $permissions;

    public function __construct(array $roles = [], array $permissions = []){
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

}