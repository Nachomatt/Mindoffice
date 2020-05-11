<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    protected $fillable =
        [
            'created_at', 'time'
        ];

    public function setFormattedTimeAttribute($value)
    {
        if ($value)
        {
            $time = explode(':', $value);

            $seconds = $time[0] * 3600;

            $seconds += $time[1] * 60;

            $seconds += $time[2];

            $this->attributes['time'] = $seconds;
        }
    }

    public function getFormattedTimeAttribute()
    {
        return Carbon::createFromTimestamp($this->time)->format('H:i:s');
    }

    public function getCurrentTimeAttribute()
    {
        return Carbon::createFromTimestamp($this->currentRawTime)->format('H:i:s');
    }

    public function getCurrentRawTimeAttribute()
    {
        $time = Carbon::createFromTimestamp($this->time);

        if ($this->created_at) {
            $time->addSeconds(Carbon::now()->diffInSeconds($this->created_at));
        }

        return $time->timestamp;
    }

    public $timestamps = false;

    protected $dates = ['created_at'];

    public function start()
    {
        $this->update
        ([
            'created_at' => now()
        ]);
    }

    public function stop()
    {
        if ($this->created_at == null)
        {
            return;
        }

        $seconds = $this->created_at->diffInSeconds(now());

        $this->update
        ([
            'created_at' => null,
            'time' => $this->time + $seconds
        ]);
    }
}
