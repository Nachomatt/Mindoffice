@extends('layouts.app')
@can('Moderate Website')



@section('content')
    <a class="goback" href="{{route('projects.show')}}">Go Back</a>
    <form action="{{route('projectmembers.store')}}" method="post">
        @csrf
         @foreach($users as $user)
            <span class="knoptekst permissionlijst">{{$user->name}}: <input type="checkbox" name="users[]" value="{{$user->name}}"></span><br>
            @endforeach
        <br> <button type="submit">Submit</button>
    </form>
@stop
@endcan