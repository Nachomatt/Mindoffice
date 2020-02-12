@extends('layouts.app')
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
        @can('Moderate Website')
        <a class="aanpassen"  href="{{route('projects.projectmembers.edit',[$project->id,$projectmember->id])}}">Edit project member</a><br><br>
    <br>
        @endcan
         <a class="aanpassen"  href="{{route('projects.projectmembers.userhours.create',[$project->id,$projectmember->id])}}">Log Hours</a><br><br>
         <a class="aanpassen"  href="{{route('projects.projectmembers.userhours.index',[$project->id,$projectmember->id])}}">See Hours</a><br><br>
        @can('Moderate Website')
    <form action="{{ route('projects.projectmembers.destroy',[$project->id,$projectmember->id]) }}" method="post">
        @csrf @method('delete')
        <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure, you want to delete projectmember: {{ $projectmember->name }}?');">Delete project member</button>
         @endcan
    </form>
    </span>
@endsection

