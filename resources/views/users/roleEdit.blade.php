@extends('layouts.app')



<!-- @can('Moderate Website') -->
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
    <a class="goback " href="{{route('users.show', $user)}}">Go Back</a>
    <form action="{{route('users.roleUpdate', $user)}}" method="post">
        @method('PUT')
        @csrf
        @foreach($roles as $role)
            {{$role->name}} <input @if($user->hasRole($role) ) checked @endif  type="radio" name="role" value="{{$role->id}}"><br>
        @endforeach
        <br>
        <button type="submit">Submit</button>
    </form>
@stop
<!-- @endcan -->
