@extends('layouts.app')
@can('Moderate Website')
@section('content')
    <span class="knoptekst">
    <a class="goback"   href="{{route('projects.show',$project->id)}}">Go Back</a>
    <br>
    <p>Name:
        {{$projectmember->name}}
    </p>
    <p>Project:
        {{$project->name}}
    </p>
        <a class="aanpassen"  href="{{route('projects.projectmembers.edit',[$project->id,$projectmember->id])}}">Edit project</a><br><br>
    <br>
    <form action="{{ route('projects.destroy', $project) }}" method="post">
        @csrf @method('delete')
        <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure, you want to delete project: {{ $project->name }}?');">Delete project</button>
    </form>
    </span>
@endsection
@endcan
