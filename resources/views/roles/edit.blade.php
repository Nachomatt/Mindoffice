@extends('layouts.app')
@can('Moderate Website')



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
    <a class="goback" href="{{route('roles.show', $role)}}">Go Back</a>
    <form action="{{route('roles.update', $role)}}" method="post">
        @method('PUT')
        @csrf
        Name: <input type="text" name="name" value="{{$role->name}}"><br>
        @foreach($permissions as $permission)
            {{$permission->name}}: <input @if($role->hasPermissionTo($permission) ) checked @endif type="checkbox" name="permissions[]" value="{{$permission->name}}"><br>
        @endforeach
        <br> <button class="aanpassen"  type="submit"><span class="knoptekst">Submit</span></button>
    </form>
@stop
@endcan
