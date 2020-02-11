@extends ('layouts.app')

@section('content')
    <div class="smallpage">
    @if (session('message'))

        <div  class="alert alert-success"  role="alert">

            {{  session('message')  }}
        </div>

    @endif
    <h1 class="mt-5 knoptekst2">Roles</h1>
    <nav class="nav">
        <ul class="nav nav-tabs">
            <li>
                <a class="nav-link knopje" href="{{ route('roles.create') }}"><h2 class="knoptekst">Add new Role</h2></a>
            </li>
        </ul>
    </nav>

    <table class="table table-striped infotabel roltabel">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td scope="row">{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td class="details"><a href="{{ route('roles.show', $role->id) }}"><h2 class="knoptekst">Details</h2></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
