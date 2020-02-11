@extends('layouts.app')
@can('Moderate Website')
@section('content')
    <a class="goback" href="{{route('projects.show',$project->id)}}">Go Back</a>
    <br>
    <a class="goback" href="{{route('userhours.create',$user->id)}}">Log new Hours</a>
    <br>
    
    <br>
    <br>
    <p class="knoptekst">Name:
        {{$user->name}}
    </p>
    @foreach($projectmembers as $p)
        @if($p->project_id = $project->id)
            <a href="{{route('userhours.show',$p->user_id)}}">{{$p->user->name}} </span><br>
            <a class="aanpassen"  href="{{route('userhours.edit',$userhour->id)}}">Edit Hour</a>
        @endif
   
    <form action="{{ route('projects.destroy', $project) }}" method="post">
        @csrf @method('delete')
        <button type="submit" class="verwijderen2" onclick="confirm('Are you sure, you want to delete project: {{ $project->name }}?');">Delete Project</button>
         @endforeach
    </form>
@endsection
@endcan
