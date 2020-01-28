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
    <a class="goback" href="{{route('users.show', $user)}}">Go Back</a>
    <form action="{{route('users.permissionUpdate', $user)}}" method="post">
        @method('PUT')
        @csrf
        @foreach($permissions as $permission)
            {{$permission->name}} <input @if($user->hasPermissionTo($permission)) checked @endif type="checkbox" name="permissions[]" value="{{$permission->name}}"><br>
        @endforeach
        <br>
        <button type="submit">Submit</button>
    </form>
@stop
<!-- @endcan -->
