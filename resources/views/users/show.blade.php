@extends('layouts.app')
@can('Moderate Website')
@section('content')
    <span class="knoptekst">
    <a class="goback"   href="{{route('users.index')}}">Go Back</a>
    <br>
    <p>Name:
        {{$user->name}}
    </p>
    <p>E-mail:
        {{$user->email}}
    </p>

    <a class="aanpassen"  href="{{route('users.edit',$user->id)}}">Edit user</a><br><br>

    <br>
    <p>Role:
        @foreach($user->roles as $role)
        {{$role->name}}
            @endforeach
    </p>
        <a class="aanpassen" href="{{route('users.roleEdit',$user->id)}}"><span class="knoptekst">Edit role</span></a><br><br>
        <a class="aanpassen" href="{{route('users.permissionEdit',$user->id)}}"><span class="knoptekst">Edit permissions</span></a><br><br>
    <br>
    <form action="{{ route('users.destroy', $user) }}" method="post">
        @csrf @method('delete')
        <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure, you want to delete user: {{ $user->name }}?');">Delete user</button>
    </form>
    </span>
@endsection
@endcan
