@extends('layouts.app')
@section('content')
    <div class="container w-25 rounded">
        <div class="card-header bg-light border border-primary shadow-lg">
            <nav class="nav ">
                <ul class="nav">
                    <li>
                        <h5 class="text-dark">Project Name: {{$project->name}}</h5><br>
                        <h5 class="text-dark">Project User: <a href="{{route('projects.projectmembers.show',[$project->id,Auth::user()->id])}}">{{Auth::user()->name}}</a></h5>
                        <h5 class="text-dark"><a href="{{route('projects.projectmembers.show',[$project->id,Auth::user()->id])}}">Show Profile</a></h5>

                    </li>
                </ul>
            </nav>
        </div>
        @can('Moderate Website')
            <div class="card-body bg-dark">
                <h3 class="text-white text-center">Project Members:</h3>
                @foreach($project->members as $p)
                    <li class="nav-item text-white">
                        <a href="{{route('projects.projectmembers.show',[$project->id, $p->id])}}"><span
                                class="text-white text-decoration-none">{{$p->name}}</span></a>
                        <br>
                    </li>
                @endforeach
            </div>
            <div class="bg-dark">
            <a class="btn btn-primary w-25 mb-1" href="{{route('projects.index')}}">Go Back</a>
            @can('Moderate Website')
                    <span><a class="btn btn-success mb-1" href="{{route('projects.projectmembers.create',$project->id)}}">Add Project Members</a>
                <a class="btn btn-primary mb-1" href="{{route('projects.edit',$project->id)}}">Edit project</a>
                    </span>
                @endcan
            <form class="d-flex justify-content-center" action="{{ route('projects.destroy', $project->id) }}"
                  method="post">
                @csrf @method('delete')
                <button type="submit" class="btn btn-danger d-flex justify-content-center"
                        onclick="confirm('Are you sure, you want to delete project: {{ $project->name }}?');">Delete
                    Project
                </button>
            </form>
            </div>
    </div>
    @endcan
@endsection

