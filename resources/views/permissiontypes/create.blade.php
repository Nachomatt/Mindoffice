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
            <a class="btn btn-primary w-50" href="{{route('permissionTypes.index')}}">Go Back</a>

            <form action="{{route('permissionTypes.store')}}" method="post">
                @csrf
                Name: <input type="text" name="name"><br>
                <br>
                <button class="btn btn-success" type="submit"><span class="knoptekst">Submit</span></button>
            </form>
        </div>
    </div>
@endsection
@endcan
