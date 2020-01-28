<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    public function user(){
        $this->hasMany('App\User');
    }
    public function project(){
        $this->hasMany('App\Project');
    }
}
