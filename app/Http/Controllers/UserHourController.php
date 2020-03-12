<?php

namespace App\Http\Controllers;

use App\Timer;
use Illuminate\Http\Request;
use App\UserHour;
use App\Project;
use App\ProjectMember;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserHourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Project $project, User $projectmember, UserHour $userhour)
    {
        $projects = Project::where('project_id', $project->id);
        $userhours = UserHour::where([
            ['user_id', $projectmember->id],
            ['project_id', $project->id]])->get();
        return view('userhours.index', compact('projects', 'project', 'projectmember', 'userhours', 'userhour'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Project $project, User $projectmember)
    {
        return view('userhours.create', compact('project', 'projectmember'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request, UserHour $userhour, Project $project, User $projectmember)
    {
        $userhour = new Userhour();
        $userhour->hours = $request->hours;
        $userhour->user_id = $projectmember->id;
        $userhour->project_id = $project->id;
        $userhour->save();
        return view('projectmembers.show', compact('project', 'projectmember', 'userhour'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return '\Illuminate\Http\Response
     */
    public function show(Project $project, User $projectmember, UserHour $userhour)
    {
        $projects = Project::all();
        $userhours = UserHour::where('user_id', $projectmember->id)->get();
        return view('userhours.show', compact('userhour', 'projects', 'projectmember', 'project', 'userhour', 'userhours'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Project $project, User $projectmember, UserHour $userhour)
    {
        $userhours = UserHour::where('user_id', $projectmember->id)->get();
        return view('userhours.edit', compact('project', 'projectmember', 'userhour', 'userhours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return '\Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, User $projectmember, UserHour $userhour)
    {
        $userhour->hours = $request->hours;
        $userhour->save();
        $userhours = Userhour::all();
        return view('userhours.index', compact('userhours', 'projects', 'projectmember', 'project', 'userhour', 'userhours'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy(Project $project, User $projectmember, UserHour $userhour)
    {
        $userhour->delete();
        $userhours = Userhour::all();
        return view('userhours.index', compact('project', 'projectmember', 'userhours'));
    }
}
