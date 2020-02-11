@extends('layouts.app')
@can('Moderate Website')
@section('content')
    <p class="knoptekst">Name:
        {{$permission->name}}
    </p>
    <a class="goback" href="{{route('permissions.index')}}">Go Back</a>
    <br>
    <br>
    <a class="aanpassen"  href="{{route('permissions.edit',$permission->id)}}">Edit permission</a>
    <br>
    <br>
    <form action="{{ route('permissions.destroy', $permission) }}" method="post">
        @csrf @method('delete')
        <button type="submit" class="verwijderen2" onclick="confirm('Are you sure, you want to delete permission: {{ $permission->name }}?');">Delete Permission</button>
    </form>
@endsection
@endcan
