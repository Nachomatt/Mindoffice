@extends('layouts.app')

@section('content')
     <nav class="nav">
        <ul class="nav nav-tabs">
            <li>
                <a class="nav-link knopje" href="{{ route('users.create') }}"><h2 class="knoptekst">Create new user</h2></a>
            </li>
        </ul>
    </nav>

    <table class="table table-striped infotabel">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td scope="row">{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="details"><a href="{{ route('users.show',$user->id) }}"><h2 class="knoptekst">Details</h2></a></td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection