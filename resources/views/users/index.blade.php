@extends ('layouts.app')

@section('content')


    <h1 class="text-white text-center">Users</h1>
    @if (session('message'))

        <div class="alert alert-success" role="alert">

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

    <nav class="nav d-flex justify-content-center">
        <ul class="nav">
            <li>
                <a class="nav-link btn btn-dark btn-outline-light mb-4" href="{{ route('users.create') }}"><h2 class="knoptekst">Create new user</h2>
                </a>
            </li>
        </ul>
    </nav>

    <div class="d-flex justify-content-center pb-5">
        <table class="table table-striped table-dark table-bordered w-75 align-self-center">
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
                    <td class="details"><a href="{{ route('users.show',$user->id) }}"><h2 class="btn btn-dark btn-outline-light">Details</h2>
                        </a></td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
