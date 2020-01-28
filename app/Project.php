<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user(){

        return $this->belongsToMany('App\User');
    }
   public function projectmember() {
        return $this->hasOne('App\ProjectMember');
    }
     public function userhour() {
        return $this->hasOne('App\UserHour');
    }
    public $timestamps = false;

}
