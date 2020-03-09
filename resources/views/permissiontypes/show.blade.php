@extends('layouts.app')
@can('Moderate Website')
@section('content')
    <h1 class="text-white text-center">Permission Type: {{$permissionType->name}}</h1>
    <div class="container d-flex justify-content-center">
        <div class="card card-body bg-dark text-white">
            <p class="knoptekst permissionTypelijst">Name:
                {{$permissionType->name}}
            </p>
            <ul class="nav flex-row">
                <li class="nav-item ml-1">
                    <a class="btn btn-primary" href="{{route('permissionTypes.index')}}">Go Back</a>
                </li>
                <li class="nav-item ml-1">
                    <a class="btn btn-success" href="{{route('permissionTypes.edit',$permissionType->id)}}">Edit permissionType</a>
                </li>
                <li class="nav-item ml-1">
                    <form action="{{ route('permissionTypes.destroy', $permissionType) }}" method="post">
                        @csrf @method('delete')
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure, you want to delete permissionType: {{ $permissionType->name }}?');">
                            Delete permissionType
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>>
    </div>

@endsection
@endcan
