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
    <div class="container">

        <div class="card card-body w-25 bg-dark text-white">
            <a class="btn btn-primary w-50 mb-2" href="{{route('roles.show', $role)}}">Go Back</a>
            <form action="{{route('roles.update', $role)}}" method="post">
                @method('PUT')
                @csrf
                Name: <input type="text" name="name" value="{{$role->name}}"><br>
                @foreach($permissions as $permission)
                    {{$permission->name}}: <input @if($role->hasPermissionTo($permission) ) checked
                                                  @endif type="checkbox" name="permissions[]"
                                                  value="{{$permission->name}}"><br>
                @endforeach
                <br>
                <button class="btn btn-success" type="submit"><span class="knoptekst">Submit</span></button>
            </form>
        </div>
    </div>
@stop
@endcan
