<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectMember;
use App\User;
use App\UserHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware("permission:see projects")->only("index", "show");

        $this->middleware("permission:create projects")->only("create", "store");

        $this->middleware("permission:edit projects")->only("edit", "update");

        $this->middleware("permission:delete projects")->only("destroy");

    }

    public function index(User $user)
    {
        if (Auth::user()->hasRole('admin'))
        {
            $projects = Project::all();
        }
        else
            {
            $projects = Auth::user()->userProjects;
            }

        return view('projects.index', compact('projects', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create(Request $request)
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        $project = new Project();

        $project->name = $request->name;

        $project->save();

        return redirect()->route('projects.index')->with('message', 'Project has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show(Project $project, User $user)
    {
        return view('projects.show', compact('project', 'projectmembers', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, Project $project)
    {
        $project->name = $request->name;

        $projects = Project::all();

        $project->save();

        return redirect()->route('projects.index', compact('projects'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
