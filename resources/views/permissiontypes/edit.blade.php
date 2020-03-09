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
    <div class="container">

        <div class="card card-body w-25 bg-dark text-white">
            <a class="btn btn-primary w-50 mb-1" href="{{route('permissionTypes.show', $permissionType)}}">Go Back</a>
            <form action="{{route('permissionTypes.update', $permissionType)}}" method="post">
                @method('PUT')
                @csrf
                Name: <input type="text" name="name" value="{{$permissionType->name}}"><br>
                <br>

                <button class="btn btn-success" type="submit">Submit</button>
            </form>
        </div>
    </div>
@stop
@endcan
