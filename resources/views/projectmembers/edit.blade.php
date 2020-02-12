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
    <form action="{{route('projects.projectmembers.update', [$project,$projectmember])}}" method="post">
        @method('PUT')
        @csrf
        User: <input type="text" name="user_id" value="{{$projectmember->id}}">{{$projectmember->name}}<br>
        User: <input type="text" name="project_id" value="{{$project->id}}">{{$project->name}}<br>
        <br>
        <button type="submit">Submit</button>
    </form>
@stop
@endcan
