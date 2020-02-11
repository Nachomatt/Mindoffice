@extends('layouts.app')
@can('Moderate Website')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li><br>
                @endforeach
            </ul>
        </div>
    @endif
    <a class="goback"   href="{{route('projects.show',$project->id)}}">Go Back</a>
    <form action="{{route('projects.projectmembers.update', $projectmember)}}" method="post">
        @method('PUT')
        @csrf
        Name: <input type="text" name="name" value="{{$projectmember->name}}"><br>
        Email: <input type="email" name="email" value="{{$projectmember->email}}"><br>
        Password: <input type="password" name="password" value="{{$user->password}}" id="myInput"><br>
        <input class="rollen" type="checkbox" onclick="myFunction()">Show Password<br>
        <br>
        <button type="submit">Submit</button>
    </form>
@stop
@endcan
