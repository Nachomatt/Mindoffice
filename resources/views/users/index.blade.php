@extends ('layouts.app')

@section('content')



    <h1 class="mt-5 knoptekst2">Users</h1>
    @if (session('message'))

        <div  class="alert alert-success"  role="alert">

            {{  session('message')  }}
        </div>

    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
