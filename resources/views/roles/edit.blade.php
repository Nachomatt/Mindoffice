@extends('layouts.app')
@can('edit roles')



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
        <a class="btn btn-primary mb-2" href="{{route('roles.show', $role)}}">Go Back</a>
        <div class="card card-body bg-dark text-white">

            <form action="{{route('roles.update', $role)}}" method="post">
                @method('PUT')
                @csrf
                Name: <input type="text" name="name" value="{{$role->name}}"><br>
                <div class="row">
                    @foreach($permissionTypes as $id => $name)
                        <div class="col col-lg-3">
                            <span class="knoptekst"><h5 class="text-white">{{ $name }}</h5></span><br>
                            @foreach($permissions->get($id, []) as $p)
                                {{$p->name}}: <input @if($role->hasPermissionTo($p) ) checked
                                                     @endif type="checkbox" name="permissions[]"
                                                     value="{{$p->name}}"><br>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <br>
                <button class="btn btn-success" type="submit"><span class="knoptekst">Submit</span></button>
            </form>
        </div>
    </div>
@stop
@endcan
