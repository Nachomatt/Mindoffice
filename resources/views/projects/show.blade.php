@extends('layouts.app')
@section('content')
    {{--Checkt of je toestemming hebt om projecten te zien, zo ja dan wordt dit getoond.--}}
    @can('see projects')
        <div class="container w-25 rounded">
            <div class="card-header bg-light border border-primary shadow-lg">
                <nav class="nav ">
                    <ul class="nav">
                        <li>
                            <h5 class="text-dark">Project Name: {{$project->name}}</h5><br>
                            <h5 class="text-dark">Project User: <a
                                    href="{{route('projects.projectmembers.show',
                            [$project->id,Auth::user()->id])}}">{{Auth::user()->name}}</a>
                            </h5>
                            <h5 class="text-dark"><a
                                    href="{{route('projects.projectmembers.show',
                            [$project->id,Auth::user()->id])}}">Show
                                    Profile</a></h5>
                            @if(Auth::user()->userProjects->count() > 0 || (Auth::user()->hasRole('admin')))
                                @can('see projects')
                                    <a class="btn btn-success nav-link" href="{{ route('timers.create') }}">
                                        <span class="text-white">{{ __('Start Working') }}</span>
                                    </a>
                                @endcan
                            @else
                            @endif

                        </li>
                    </ul>
                </nav>
            </div>
            {{--Checkt of je toestemming hebt om projectleden te managen, zo ja dan wordt dit getoond.--}}
            @can('manage project members')
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
            @endcan
            <div class="bg-dark">
                <div class="d-flex justify-content-start">
                    <div class="row">
                        <div class="col-12 mx-2">
                            <a class="btn btn-primary" href="{{route('projects.index')}}">Go Back</a>
                            {{--Checkt of je toestemming hebt om projecten te maken, zo ja dan wordt dit getoond.--}}
                            @can('create projects')
                                <a class="btn btn-success"
                                   href="{{route('projects.projectmembers.create',$project->id)}}">Add
                                    Project Members</a>
                            @else
                            @endcan
                            {{--Checkt of je toestemming hebt om projecten aan te passen, zo ja dan wordt dit getoond.--}}
                            @can('edit projects')
                                <a class="btn btn-primary" href="{{route('projects.edit',$project->id)}}">Edit
                                    project</a>
                            @endcan

                        </div>
                    </div>
                </div>
                @can('delete projects')
                    <form action="{{ route('projects.destroy', $project->id) }}"
                          method="post">
                        @csrf @method('delete')

                        <button type="submit" class="btn btn-danger w-100 mt-1"
                                onclick="return confirm
                                    ('Are you sure, you want to delete project: {{ $project->name }}?');">
                            Delete
                            Project
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    @endcan
@endsection

