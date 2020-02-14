@extends('layouts.app')
@can('see projects')
@section('content')

    <h5 class="text-white text-center"><a class="btn btn-primary mx-1"
                                          href="{{route('projects.projectmembers.show',[$project->id,$projectmember->id])}}">Go
            Back</a>Hours logged by: {{Auth::user()->name}}</h5>
    <div class="container">
        <div class="row">
            @foreach($userhours as $u)
                <div class="col-3 mb-2">
                    <div class="card card-body bg-dark text-white">

                        <br>
                        <p>Hours logged:
                            {{$u->hours}}
                        </p>
                        <p>Project:
                            {{$u->project->name}}
                        </p>
                        <h5 class="text-white text-smol">Hour log date: {{$u->created_at->format('d-m-y H:i')}}</h5>
                        <a class="aanpassen btn btn-success w-75 mb-1"
                           href="{{route('projects.projectmembers.userhours.edit',[$project->id,$projectmember->id,$u->id])}}">Edit
                            logged hours</a>
                        <form
                            action="{{route('projects.projectmembers.userhours.destroy',[$project->id,$projectmember->id,$u->id])}}"
                            method="post">
                            @csrf @method('delete')
                            <button type="submit" class="btn btn-danger w-75"
                                    onclick="confirm('Are you sure, you want to delete logged hours from {{ $projectmember->name }}?');">
                                Delete logged time
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@endcan
