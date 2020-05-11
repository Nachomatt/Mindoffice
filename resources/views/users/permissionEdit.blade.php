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
        <a class="btn btn-primary" href="{{route('users.show', $user)}}">Go Back</a>
        <div class="card card-body bg-dark text-white">
            <form action="{{route('users.permissionUpdate', $user)}}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    @foreach($permissionTypes as $id => $name)
                        <div class="col col-lg-3">
                            <span class="knoptekst"><h5 class="text-white">{{ $name }}</h5></span><br>
                            @foreach($permissions->get($id, []) as $p)
                                {{$p->name}}: <input @if($user->hasPermissionTo($p) ) checked
                                                     @endif type="checkbox" name="permissions[]"
                                                     value="{{$p->name}}"><br>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <br>
                <button class="btn btn-success" type="submit">Submit</button>
            </form>
        </div>
    </div>
@stop
@endcan
