@extends('layouts.app')
@can('create permissions')



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
            <a class="btn btn-primary w-50" href="{{route('permissions.index')}}">Go Back</a>

            <form action="{{route('permissions.store')}}" method="post">
                @csrf
                Name: <input type="text" name="name"><br>
                <br>
                @foreach($permissionTypes as $permissionType)
                    {{$permissionType->name}}: <input type="radio" name="permission_type_id"
                                                      value="{{$permissionType->id}}"><br>
                @endforeach
                <button class="btn btn-success" type="submit"><span class="knoptekst">Submit</span></button>
            </form>
        </div>
    </div>
@endsection
@else
    <script>window.location = "/login";</script>
@endcan
