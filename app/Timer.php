<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    protected $fillable = [
        'created_at', 'time'
    ];

    public function setTimeAttribute($value)
    {
        $this->attributes['time'] = strtotime($value);
    }
    public function getTimeAttribute($value)
    {

    }

    public $timestamps = false;

    protected $dates = ['created_at'];

    public function start()
    {
        $this->update([
            'created_at' => now()
        ]);
    }
    public function pause()
    {
        $this->update([
            'created_at' => null,
        ]);
    }

    public function stop()
    {
        $seconds = $this->created_at->diffInSeconds(now());

        $this->update([
            'created_at' => null,
            'time' => $this->time + $seconds
        ]);
    }
}
