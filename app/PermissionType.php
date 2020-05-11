<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionType extends Model
{
    public function permissions()
    {

        return $this->hasMany('App\Permission', 'permission_type_id', 'id');
    }
}
