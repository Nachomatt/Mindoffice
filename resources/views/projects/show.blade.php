@extends('layouts.app')
@can('Moderate Website')
@section('content')
    <a class="goback" href="{{route('projects.index')}}">Go Back</a>
    <br>
    <a class="goback" href="{{route('projects.projectmembers.create',$project->id)}}">Add Project Members</a>
    <br>
    <a class="aanpassen"  href="{{route('projects.edit',$project->id)}}">Edit project</a>
    <br>
    <br>
    <p class="knoptekst">Name:
        {{$project->name}}
    </p>
    @foreach($projectmembers as $p)
        @if($p->project_id = $project->id)
            <a href="{{route('projects.projectmembers.userhours.index',$p->user_id)}}">{{$p->user->name}} </span><br>
        @endif
    @endforeach
    <form action="{{ route('projects.destroy', $project) }}" method="post">
        @csrf @method('delete')
        <button type="submit" class="verwijderen2" onclick="confirm('Are you sure, you want to delete project: {{ $project->name }}?');">Delete Project</button>
    </form>
@endsection
@endcan
