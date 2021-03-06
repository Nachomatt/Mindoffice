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
            <a class="btn btn-primary w-50 " href="{{route('users.show', $user)}}">Go Back</a>
            <form action="{{route('users.roleUpdate', $user)}}" method="post">
                @method('PUT')
                @csrf
                @foreach($roles as $role)
                    {{$role->name}} <input @if($user->hasRole($role) ) checked @endif  type="radio" name="role"
                                           value="{{$role->id}}"><br>
                @endforeach
                <br>
                <button class="btn btn-success" type="submit">Submit</button>
            </form>
        </div>
    </div>
@stop
@endcan
