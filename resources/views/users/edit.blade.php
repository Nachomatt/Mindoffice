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
            <a class="btn btn-primary w-50" href="{{route('users.show', $user)}}">Go Back</a>
            <form action="{{route('users.update', $user)}}" method="post">
                @method('PUT')
                @csrf
                Name: <input type="text" name="name" value="{{$user->name}}"><br>
                Email: <input type="email" name="email" value="{{$user->email}}"><br>
                Password: <input type="password" name="password" value="{{$user->password}}" id="myInput"><br>
                <input class="rollen" type="checkbox" onclick="myFunction()">Show Password<br>
                <br>
                <button class="btn btn-success" type="submit">Submit</button>
            </form>
        </div>
    </div>
@stop
@endcan
