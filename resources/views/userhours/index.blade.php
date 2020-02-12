@extends('layouts.app')
@can('see projects')
@section('content')
    <a class="goback" href="{{route('projects.projectmembers.show',[$project->id,$projectmember->id])}}">Go Back</a>
    @foreach($userhours as $u)
        <span class="knoptekst">

    <br>
    <p>Hours:
        {{$u->hours}}
    </p>
    <p>Project:
        {{$u->project->name}}
    </p>
        <a class="aanpassen"
           href="{{route('projects.projectmembers.userhours.edit',[$project->id,$projectmember->id,$u->id])}}">Edit logged hours</a><br><br>
    <br>
    <form action="{{route('projects.projectmembers.userhours.destroy',[$project->id,$projectmember->id,$u->id])}}"
          method="post">
                    @csrf @method('delete')
                    <button type="submit" class="btn btn-danger"
                            onclick="confirm('Are you sure, you want to delete logged hours from {{ $projectmember->name }}?');">Delete logged time</button>
                </form>
    </span>
    @endforeach
@endsection
@endcan
