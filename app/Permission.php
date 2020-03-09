<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $with = ['type'];

    public function role()
    {
        return $this->hasMany('App\Role');
    }

    public function type()
    {
        return $this->hasOne('App\PermissionType', 'id', 'permission_type_id');
    }
}
