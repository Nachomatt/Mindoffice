@extends('layouts.app')
@can('see permissions')

@section('content')
    <h1 class="text-white text-center">Permission: {{$permission->name}}</h1>
    <div class="container d-flex justify-content-center">
        <div class="card card-body bg-dark text-white">
            <p class="knoptekst permissionlijst">Name:
                {{$permission->name}}
            </p>
            <p>Type:
                {{$permission->type->name ?? ''}}
            </p>
            <ul class="nav flex-row">
                <li class="nav-item ml-1">
                    <a class="btn btn-primary" href="{{route('permissions.index')}}">Go Back</a>
                </li>
                <li class="nav-item ml-1">
                    <a class="btn btn-success" href="{{route('permissions.edit',$permission->id)}}">Edit permission</a>
                </li>
                <li class="nav-item ml-1">
                    <form action="{{ route('permissions.destroy', $permission) }}" method="post">
                        @csrf @method('delete')
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm
                                    ('Are you sure, you want to delete permission: {{ $permission->name }}?');">
                            Delete
                            permission
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

@endsection
@endcan
