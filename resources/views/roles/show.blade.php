@extends('layouts.app')
@can('Moderate Website')
@section('content')
    <p class="knoptekst permissionlijst">Name:
        {{$role->name}}
    </p>
    <p class="knoptekst permissionlijst">Guard:
        {{$role->guard_name}}
    </p>
    <a class="goback" href="{{route('roles.index')}}">Go Back</a>
    <br>
    <br>
    <a class="aanpassen"  href="{{route('roles.edit',$role->id)}}">Edit role</a>
    <br>
    <br>
    <div class="permissionlijst">
        <span class="knoptekst">Permissions:</span><br>
    @foreach($permission as $p)
            <span class="knoptekst">{{$p->name}}</span><br>
    @endforeach
    <br>
    </div>
    <form action="{{ route('roles.destroy', $role) }}" method="post">
        @csrf @method('delete')
        <button type="submit" class="btn btn-danger knoptekst" onclick="confirm('Are you sure, you want to delete role: {{ $role->name }}?');">Delete Role</button>
    </form>
@endsection
@endcan
