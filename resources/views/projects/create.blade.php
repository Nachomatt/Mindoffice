@extends('layouts.app')
@can('Moderate Website')



@section('content')
    <div class="container">

        <div class="card card-body w-25 bg-dark text-white">
            <form action="{{route('projects.store')}}" method="post">
                @csrf
                Project Name: <input class="w-50" type="text" name="name"><br>
                <br>
                <button class="btn btn-success" type="submit">Submit</button>
                <a class="btn btn-primary" href="{{route('projects.index')}}">Go Back</a>
            </form>
        </div>
    </div>
@stop
@endcan
