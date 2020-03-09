@extends ('layouts.app')

@section('content')
    <div class="smallpage">
        @if (session('message'))

            <div class="alert alert-success" role="alert">

                {{  session('message')  }}
            </div>

        @endif
        <nav class="nav d-flex justify-content-center">
            <ul class="nav">
                <li>
                    <h1 class="text-white text-center">Roles</h1>
                    <a class="nav-link btn btn-dark btn-outline-light mb-4" href="{{ route('roles.create') }}"><h2
                            class="text-center">Create new
                            role</h2></a>
                </li>
            </ul>
        </nav>
        <div class="d-flex justify-content-center">
            <table class="table table-striped table-dark table-bordered w-75 align-self-center">
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
                        <td class="details"><a href="{{ route('roles.show', $role->id) }}"><h2
                                    class="btn btn-dark btn-outline-light">
                                    Details</h2>
                            </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
