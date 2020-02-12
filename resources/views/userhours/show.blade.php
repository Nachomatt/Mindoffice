@extends('layouts.app')
@can('Moderate Website')
@section('content')
    <a class="goback"   href="{{route('projectmembers.show',[$project->id,$projectmember->id])}}">Go Back</a>
    @foreach($userhours as $u)
    <span class="knoptekst">

    <br>
    <p>Hours:
        {{$u->hours}}
    </p>
    <p>Project:
        {{$project->name}}
    </p>
{{--        <a class="aanpassen"  href="{{route('projects.projectmembers.edit',[$project->id,$projectmember->id])}}">Edit project</a><br><br>--}}
    <br>
{{--    <form action="{{ route('projects.destroy', $project) }}" method="post">--}}
{{--        @csrf @method('delete')--}}
{{--        <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure, you want to delete project: {{ $project->name }}?');">Delete project</button>--}}
{{--    </form>--}}
    </span>
    @endforeach
@endsection
@endcan
