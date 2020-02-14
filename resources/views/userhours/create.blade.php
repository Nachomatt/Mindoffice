@extends('layouts.app')
@can('see projects')



@section('content')
    <div class="container w-25">
        <div class="card card-header border-bottom p-0 bg-dark">
            <h5 class="text-white m-2 text-center">Log your hours here, {{ Auth::user()->name }}</h5>
        </div>
        <div class="card-body bg-dark">
            <form action="{{route('projects.projectmembers.userhours.store',[$project,$projectmember])}}" method="post">
                @csrf
                <h5 class="text-white float-left mt-1">Hours: </h5>
                <input class="ml-3" type="number" name="hours"><br>
                <br>
                <button class="btn btn-success float-left" type="submit">Submit</button>
            </form>
            <div class="d-flex justify-content-start">
                <a class="btn btn-primary float-right mx-2"
                   href="{{route('projects.projectmembers.show',[$project->id,$projectmember->id])}}">Go Back</a>
            </div>
        </div>
    </div>
@stop
@endcan
