<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreProjectMembers;
use App\Project;
use App\User;
use App\ProjectMember;
use Illuminate\Http\Request;

class ProjectMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $projects = Project::all();
        $projectmembers = $project->members;
        return view('projectmembers.index', compact('projects','projectmembers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $projects = Project::all();
        $users = User::all();
        return view('projectmembers.create', compact('project','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  '\Illuminate\Http\Request  $request'
     * @return '\Illuminate\Http\Response'
     */
    public function store(StoreProjectMembers $request, Project $project)
    {
        //$request->users heeft alle user IDs die zijn aangevinkt
        foreach($request->users as $u)
        {
            $user = new ProjectMember();
            $user->user_id = $u;
            $user->project_id = $project->id;
            $user->save();
        }
        return redirect()->route('projects.show',compact('project'))->with('message', 'Project member(s) have been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  'int  $id'
     * @return '\Illuminate\Http\Response'
     */
    public function show(Project $project, User $projectmember)
    {
        return view('projectmembers.show', compact('project','projectmember'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, User $projectmember)
    {
        return view('projectmembers.edit', compact('project','projectmember'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request '$'request'
     * @param  int  '$id'
     * @return '\Illuminate\Http\Response'
     */
    public function update(Request $request, ProjectMember $user, Project $project)
    {
        $projectmembers = $project->members;
        $user->user_id = $request->user_id;
        $user->project_id = $request->project_id;
        $user->save();
        return view('projects.show', compact('project','projectmembers'));
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
