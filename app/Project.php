<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function members() {
        return $this->belongsToMany(User::class, 'project_members');
    }

    public function userhour()
    {
        return $this->hasOne('App\UserHour');
    }
    public $timestamps = false;

}
