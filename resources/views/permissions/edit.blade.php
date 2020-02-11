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
    <a class="goback" href="{{route('permissions.show', $permission)}}">Go Back</a>
    <form action="{{route('permissions.update', $permission)}}" method="post">
        @method('PUT')
        @csrf
        Name: <input type="text" name="name" value="{{$permission->name}}"><br>
        <br> <button type="submit">Submit</button>
    </form>
@stop
@endcan
