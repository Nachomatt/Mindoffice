@extends('layouts.app')
@section('content')
    @can('Moderate Website')
    <br>
    <a class="goback" href="{{route('projects.projectmembers.create',$project->id)}}">Add Project Members</a>
    <br>
    <a class="aanpassen"  href="{{route('projects.edit',$project->id)}}">Edit project</a>
    <br>
    <br>
    @endcan
    <a class="goback" href="{{route('projects.index')}}">Go Back</a><br>
    Project Name:{{$project->name}}<br>
    Project User:<a href="{{route('projects.projectmembers.show',[$project->id,Auth::user()->id])}}">{{ Auth::user()->name }}</a><br>
    @can('Moderate Website')
    @foreach($project->members as $p)
            <a href="{{route('projects.projectmembers.show',[$project->id, $p->id])}}">{{$p->name}}</a><br>
    @endforeach
    <form action="{{ route('projects.destroy', $project->id) }}" method="post">
        @csrf @method('delete')
        <button type="submit" class="verwijderen2" onclick="confirm('Are you sure, you want to delete project: {{ $project->name }}?');">Delete Project</button>
    </form>
    @endcan
@endsection

