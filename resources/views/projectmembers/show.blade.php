@extends('layouts.app')
@section('content')
    @can('manage project members')
        <div class="container">
            <div class="card bg-dark text-white w-100">
                <br>
                <p>Name:
                    {{$projectmember->name}}
                </p>
                <p>Project:
                    {{$project->name}}
                </p>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="btn btn-primary mb-2 my-2" href="{{route('projects.show',$project->id)}}">Go Back</a>
                    </li>
                    <li class="nav-item">
                        @can('manage project members')
                            <a class="btn btn-success mb-2 my-2"
                               href="{{route('projects.projectmembers.edit',
                                [$project->id,$projectmember->id])}}">Edit
                                project member</a>
                        @endcan
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary mb-2 my-2"
                           href="{{route('projects.projectmembers.userhours.create',
                            [$project->id,$projectmember->id])}}">Log
                            Hours</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light mb-2 my-2"
                           href="{{route('projects.projectmembers.userhours.index',
                            [$project->id,$projectmember->id])}}">See
                            Hours</a>
                    </li>
                    <li class="nav-item">
                        @can('manage project members')
                            <form
                                action="{{ route('projects.projectmembers.destroy',
                            [$project->id,$projectmember->id]) }}"
                                method="post">
                                @csrf @method('delete')
                                <button type="submit" class="btn btn-danger mb-2 my-2"
                                        onclick="return confirm
                                            ('Are you sure, you ' +
                                            'want to delete projectmember: {{ $projectmember->name }}?');">
                                    Delete project member
                                </button>
                                @endcan
                            </form>
                    </li>
                </ul>


            </div>
        </div>
    @endcan
@endsection

