<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHour extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function project(){
        return $this->belongsTo('App\Project');
    }
        public $timestamps = true;
}
