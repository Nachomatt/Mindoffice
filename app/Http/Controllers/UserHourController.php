<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userhour;
use App\Project;
use App\ProjectMember;
use App\User;

class UserHourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project, User $projectmember)
    {
        $projects = Project::all();
        $userhours = Userhour::where('user_id',$projectmember->id);
        return view('userhours.index',compact('projects','project','projectmember','userhours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project, User $projectmember)
    {
        return view('userhours.create',compact('project','projectmember'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Userhour $userhour,Project $project ,  User $projectmember)
    {
        $userhour = new Userhour();
        $userhour->hours = $request->hours;
        $userhour->user_id = $projectmember->id;
        $userhour->project_id = $project->id;
        $userhour->save();
        return view('projectmembers.show',compact('project','projectmember','userhour'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, User $projectmember, Userhour $userhour )
    {
        $projects = Project::all();
        $userhours = Userhour::all();
        return view('userhours.show',compact('userhours','projects','projectmember','project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
