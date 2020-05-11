<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends \Spatie\Permission\Models\Role
{
    protected $table = 'roles';

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany('App\Permission', 'role_has_permissions');
    }
}
