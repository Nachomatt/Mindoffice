@extends('layouts.app')
@can('Moderate Website')
@section('content')
    <h1 class="text-white text-center">User: {{$user->name}}</h1>
    <div class="container d-flex justify-content-center">
        <div class="card card-body bg-dark text-white">
            <ul class="nav flex-row">
                <li class="nav-item ml-1">
                    <a class="btn btn-primary" href="{{route('users.index')}}">Go Back</a>
                </li>
            </ul>
            <p>Name:
                {{$user->name}}
            </p>
            <p>E-mail:
                {{$user->email}}
            </p>
            <br>
            <p>Role:
                @foreach($user->roles as $role)
                    {{$role->name}}
                @endforeach
            </p>
            <ul class="nav flex-row">
                <li class="nav-item ml-1">
                    <a class="btn btn-success" href="{{route('users.edit',$user->id)}}">Edit user</a>
                </li>
                <li class="nav-item ml-1">
                    <a class="btn btn-success" href="{{route('users.roleEdit',$user->id)}}"><span class="knoptekst">Edit role</span></a>
                </li>
                <li class="nav-item ml-1">
                    <a class="btn btn-success" href="{{route('users.permissionEdit',$user->id)}}"><span
                            class="knoptekst">Edit permissions</span></a>
                </li>
                <form action="{{ route('users.destroy', $user) }}" method="post">
                    @csrf @method('delete')
                    <button type="submit" class="btn btn-danger ml-1"
                            onclick="return confirm('Are you sure, you want to delete user: {{ $user->name }}?');">Delete user
                    </button>
                </form>
            </ul>
        </div>
    </div>
@endsection
@endcan
