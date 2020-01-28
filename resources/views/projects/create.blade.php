@extends('layouts.app')
@can('Moderate Website')



@section('content')
    <a class="goback" href="{{route('projects.index')}}">Go Back</a>
    <form action="{{route('projects.store')}}" method="post">
        @csrf
        Name: <input type="text" name="name"><br>
        <input type="checkbox" onclick="myFunction()">Show Password<br>
        <br> <button type="submit">Submit</button>
    </form>
@stop
@endcan