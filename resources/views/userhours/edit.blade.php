@extends('layouts.app')
@can('see projects')



@section('content')
    <a class="goback" href="{{route('projects.projectmembers.show',[$project,$projectmember])}}">Go Back</a>
    <form action="{{route('projects.projectmembers.userhours.update',[$project,$projectmember->id,$userhour])}}" method="post">
        @csrf
        @method('PUT')
        Amount of hours: <input type="number" name="hours" value="{{$userhour->hours}}"><br>
        <br> <button type="submit">Submit</button>
    </form>
@stop
@endcan
