@extends('layouts.app')
<!-- @can('Moderate Website') -->



@section('content')
    <a class="goback" href="{{route('users.index')}}">Go Back</a>
    <form action="{{route('users.store')}}" method="post">
        @csrf
        Name: <input type="text" name="name"><br>
        Email: <input type="email" name="email"><br>
        Password: <input type="password" name="password" id="myInput"><br>
        <input type="checkbox" onclick="myFunction()">Show Password<br>
        <select name="role">
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select><br>
        @foreach($permissions as $permission)
            {{$permission->name}}: <input type="checkbox" name="permissions[]" value="{{$permission->name}}"><br>
        @endforeach

        <br> <button type="submit">Submit</button>
    </form>
@stop
<!-- @endcan -->
