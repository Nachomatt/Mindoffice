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
    <a class="goback" href="{{route('roles.index')}}"><span class="knoptekst">Go Back</span></a>

    <form action="{{route('roles.store')}}" method="post">
        @csrf
        <span class="knoptekst permissionlijst">Name: <input type="text" name="name"></span><br>
        @foreach($permissions as $permission)
            <span class="knoptekst permissionlijst">{{$permission->name}}: <input type="checkbox" name="permissions[]" value="{{$permission->name}}"></span><br>
            @endforeach
        <br> <button class="aanpassen" type="submit"><span class="knoptekst">Submit</span></button>
    </form>

@endsection
@endcan
