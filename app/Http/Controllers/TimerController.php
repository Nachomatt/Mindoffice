<?php

namespace App\Http\Controllers;

use App\Project;
use App\Timer;
use App\User;
use App\UserHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimerController extends Controller
{
    public function index(Timer $timer)
    {
        $timers = Timer::where('user_id', Auth::user()->id)->get();
        return view('timers.index', compact('timers'));
    }

    public function create(Project $project, User $projectmember)
    {
        $projects = Auth::user()->userProjects()->get();
        return view('timers.create', compact('projects', 'projectmember'));
    }

    public function store(Request $request, Timer $timer)
    {
        $timer = new Timer();
        $timer->formattedTime = $request->time;
        $timer->user_id = Auth::user()->id;
        $timer->project_id = $request->project_id;
        $timer->save();

        return redirect()->route('home');
    }

    public function edit(Project $project, User $projectmember)
    {
        $projects = Auth::user()->userProjects()->get();
        return view('timers.create', compact('projects', 'projectmember'));
    }

    public function update(Request $request, Timer $timer)
    {
        $timer->user_id = Auth::user()->id;
        $timer->project_id = $request->project_id;
        dd($timer);
        $timer->save();
        return redirect()->route('home');
    }

    public function start(Request $request, Timer $timer)
    {
        $timer->start();

        return redirect()->back();
    }

    public function pause(Request $request, Timer $timer)
    {
        $timer->stop();

        return redirect()->back();
    }

    public function stop(Request $request, Timer $timer)
    {
        $timer->stop();
        $timers = Timer::where('user_id', Auth::user()->id)->get();
        $projects = Auth::user()->userProjects()->get();
        return view('timers.log', compact('timer','timers','projects'));
    }

    public function log(Timer $timer)
    {
        $projects = Auth::user()->userProjects()->get();
        return view('timers.log', compact('timer','projects'));
    }

    public function sendlog(Request $request, Timer $timer)
    {
        $userhour = new UserHour();
        $userhour->user_id = Auth::user()->id;
        $userhour->project_id = $request->project_id;
        $userhour->hours = $timer->formattedTime;
        $userhour->save();
        $timer->delete();
        return redirect()->route('home');
    }

    public function destroy(Timer $timer)
    {
        $timer->delete();

        return redirect()->back();
    }

}
