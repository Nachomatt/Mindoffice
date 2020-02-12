<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectMembers;
use App\Project;
use App\User;
use App\ProjectMember;
use App\UserHour;
use Illuminate\Http\Request;

class ProjectMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return '\Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $projects = Project::all();
        return view('projectmembers.index', compact('projects','project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return '\Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $users = User::all();
        return view('projectmembers.create', compact('project', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  '\Illuminate\Http\Request  $request'
     * @return '\Illuminate\Http\Response'
     */
    public function store(Request $request, Project $project)
    {
        //$request->users heeft alle user IDs die zijn aangevinkt
        foreach ($request->users as $u) {
            $user = new ProjectMember();
            $user->user_id = $u;
            $user->project_id = $project->id;
            $user->save();
        }
        return redirect()->route('projects.show', compact('project'))->with('message', 'Project member(s) have been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  'int  $id'
     * @return '\Illuminate\Http\Response'
     */
    public function show(UserHour $userhour, Project $project,User $projectmember)
    {
        return view('projectmembers.show', compact('project', 'projectmember', 'userhour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return '\Illuminate\Http\Response
     */
    public function edit(Project $project, User $projectmember)
    {
        $ps = Project::all();
        return view('projectmembers.edit', compact('project', 'ps', 'projectmember'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request '$'request'
     * @param int  '$id'
     * @return '\Illuminate\Http\Response'
     */
    public function update(Request $request, Project $project, User $projectmember)
    {
        $projectmember->user_id = $project->members()->attach(User::find($projectmember->id));
        $projectmember->userProjects()->detach(Project::find($project->id));
        $projectmember->userProjects()->attach(Project::find($request->project_id));

        return view('projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return '\Illuminate\Http\Response
     */
    public function destroy(Project $project, User $projectmember)
    {
        $project->members()->detach(Project::find($project->id));
        $project->members()->detach(User::find($projectmember->id));
        return view('projects.show', compact('project'));
    }
}
