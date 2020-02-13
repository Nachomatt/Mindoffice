@extends('layouts.app')
@can('Moderate Website')



@section('content')
    <div class="container">

        <div class="card card-body w-25 bg-dark text-white">
            <form action="{{route('projects.update',$project->id)}}" method="post">
                @csrf
                @method('PUT')
                Project Name: <input class="w-50" type="text" name="name" value="{{$project->name}}"><br>
                <br>
                     <button class="btn btn-success" type="submit">Submit</button>
                     <a class="btn btn-primary" href="{{route('projects.show',$project)}}">Go Back</a>
            </form>
        </div>
    </div>


@stop
@endcan
