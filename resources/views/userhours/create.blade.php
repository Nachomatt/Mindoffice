@extends('layouts.app')
@can('see projects')



@section('content')
    <a class="goback" href="{{route('projects.projectmembers.show',[$project,$projectmember])}}">Go Back</a>
    <form action="{{route('projects.projectmembers.userhours.store',[$project,$projectmember])}}" method="post">
        @csrf
        <input type="number" name="hours"><br>
        <br> <button type="submit">Submit</button>
    </form>
@stop
@endcan
