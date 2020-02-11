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
        return view('projectmembers.index', compact('projectmembers','projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project, Store $request)
    {
        $projects = Project::all();
        $users = User::all();
        return view('projectmembers.create', compact('project','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
