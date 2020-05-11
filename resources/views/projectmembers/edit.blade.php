@extends('layouts.app')
@section('content')
    @can('manage project members')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li><br>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container w-25">
        <div class="card card-header border-bottom p-0 bg-dark">
            <h5 class="text-white m-2 text-center">Edit Project of Project Member: {{$projectmember->name}}</h5>
        </div>
        <div class="card-body bg-dark">
            <form action="{{route('projects.projectmembers.update', [$project,$projectmember])}}" method="post">
                @method('PUT')
                @csrf
                <h5 class="text-white float-left mt-2">Project: </h5>
                <select name="project_id" class="btn btn-secondary dropdown-toggle mx-2 mb-2">
                    @foreach($ps as $project)
                        <option value="{{$project->id}}">{{$project->name}}<br></option>
                    @endforeach
                </select>
                <br>
                <button class="btn btn-success float-left" type="submit">Submit</button>
            </form>
            <div class="d-flex justify-content-start">
                <a class="btn btn-primary float-right mx-2"
                   href="{{route('projects.projectmembers.show',[$project->id,$projectmember->id])}}">Go Back</a>
            </div>
        </div>
    </div>
    @endcan
@endsection

