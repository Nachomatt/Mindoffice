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
    <a class="goback" href="{{route('permissions.index')}}">Go Back</a>

    <form action="{{route('permissions.store')}}" method="post">
        @csrf
        Name: <input type="text" name="name"><br>
        <br> <button class="aanpassen"  type="submit"><span class="knoptekst">Submit</span></button>
    </form>
@endsection
@endcan
