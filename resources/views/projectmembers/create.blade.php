@extends('layouts.app')
@can('Moderate Website')



@section('content')
    <a class="goback" href="{{route('projects.show',$project->id)}}">Go Back</a>
    <form action="{{route('projects.projectmembers.store',$project->id)}}" method="post">
        @csrf
         @foreach($users as $user)
            <span class="knoptekst permissionlijst">{{$user->name}}: <input type="checkbox" name="users[]" value="{{$user->id}}"></span><br>
            @endforeach
        <br> <button type="submit">Submit</button>
    </form>
@stop
@endcan