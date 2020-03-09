@extends('layouts.app')
@can('Moderate Website')
@section('content')
    <h1 class="text-white text-center">Role: {{$role->name}}</h1>
    <div class="container d-flex justify-content-center">
        <div class="card card-body bg-dark text-white">
            <p class="knoptekst permissionlijst">Name:
                {{$role->name}}
            </p>
            <p class="knoptekst permissionlijst">Guard:
                {{$role->guard_name}}
            </p>
            <div class="row">
                @foreach($permissionTypes as $id => $name)
                    <div class="col col-lg-3">
                        <span class="knoptekst"><h5 class="text-white">{{ $name }}</h5></span><br>

                        <ul>
                        @foreach($permissions->get($id, []) as $p)
                            <li><span class="knoptekst">{{$p->name}}</span></li>
                        @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>

            <ul class="nav flex-row">
                <li class="nav-item ml-1">
                    <a class="btn btn-primary" href="{{route('roles.index')}}">Go Back</a>
                </li>
                <li class="nav-item ml-1">
                    <a class="btn btn-success" href="{{route('roles.edit',$role->id)}}">Edit role</a>
                </li>
                <li class="nav-item ml-1">
                    <form action="{{ route('roles.destroy', $role) }}" method="post">
                        @csrf @method('delete')
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure, you want to delete role: {{ $role->name }}?');">
                            Delete
                            Role
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
@endsection
@endcan
