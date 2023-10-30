<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $guarded = ["id"];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'roles_permissions');
    }

}
