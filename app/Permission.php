<?php

namespace App;

class Permission extends \Spatie\Permission\Models\Permission
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
