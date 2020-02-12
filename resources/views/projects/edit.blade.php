@extends('layouts.app')
@can('Moderate Website')



@section('content')
    <a class="goback" href="{{route('projects.index')}}">Go Back</a>
    <form action="{{route('projects.update',$project->id)}}" method="post">
        @csrf
        @method('PUT')
        Name: <input type="text" name="name" value="{{$project->name}}"><br>
        <br> <button type="submit">Submit</button>
    </form>
@stop
@endcan
