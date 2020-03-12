@extends('layouts.app')
@can('edit permissions')



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
            <a class="btn btn-primary w-50 mb-1" href="{{route('permissions.show', $permission)}}">Go Back</a>
            <form action="{{route('permissions.update', $permission)}}" method="post">
                @method('PUT')
                @csrf
                Name: <input type="text" name="name" value="{{$permission->name}}"><br>
                <br>
                @foreach($permissionTypes as $permissionType)
                    {{$permissionType->name}}: <input @if($permission->permissionType) checked @endif type="radio" name="permission_type_id" value="{{$permissionType->id}}"><br>
                @endforeach
                <button class="btn btn-success" type="submit">Submit</button>
            </form>
        </div>
    </div>
@stop
@endcan
