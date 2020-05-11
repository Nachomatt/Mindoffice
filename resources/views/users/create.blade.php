@extends('layouts.app')
@can('Moderate Website')



@section('content')
    <div class="container">
        <div class="card bg-dark text-white">
            <a class="goback" href="{{route('users.index')}}">Go Back</a>
            <form action="{{route('users.store')}}" method="post">
                @csrf
                Name: <input type="text" name="name"><br>
                Email: <input type="email" name="email"><br>
                Password: <input type="password" name="password" id="myInput"><br>
                <input type="checkbox" onclick="myFunction()">Show Password<br>
                <select class="ml-3" name="role">
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select><br>
                <div class="container">
                    <div class="row">
                        @foreach($permissionTypes as $id => $name)
                            <div class="col col-lg-3">
                                <span class="knoptekst"><h5 class="text-white">{{ $name }}</h5></span><br>
                                @foreach($permissions->get($id, []) as $p)
                                    {{$p->name}}: <input type="checkbox" name="permissions[]"
                                                         value="{{$p->name}}"><br>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
                <br>
                <button class="btn btn-success m-1" type="submit">Submit</button>
            </form>
        </div>
    </div>
@stop
@endcan
