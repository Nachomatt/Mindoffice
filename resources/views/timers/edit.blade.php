@extends('layouts.app')
@can('see projects')



@section('content')
    <div class="container w-25">
        <div class="card card-header border-bottom p-0 bg-dark">
            <h5 class="text-white m-2 text-center">Start working here, {{ Auth::user()->name }}</h5>
        </div>
        <div class="card-body bg-dark">
            <form action="{{route('timers.update',$timer->id)}}" method="post">
                @csrf
                @method('PUT')
                <h5 class="text-white float-left mt-1">Begintijd: </h5>
                <input class="ml-3" name="time" placeholder="00:00:00" value="{{$timer->time}}"><br>
                <br>
                <h5 class="text-white float-left mt-1 mr-2">Project: </h5>
                <select name="project_id">
                    <option value="{{$timer->project->name}}"></option>
                    @foreach($projects as $p)
                        <option value="{{$p->id}}">{{$p->name}}</option>
                    @endforeach
                </select>
                <br>
                <button class="btn btn-success float-left mt-2" type="submit">Submit</button>
            </form>
            <span class="d-flex justify-content-start mt-2">
                <a class="btn btn-primary mx-2"
                   href="{{url('/home')}}">Go Back</a>
            </span>
        </div>
    </div>
@stop
@endcan
