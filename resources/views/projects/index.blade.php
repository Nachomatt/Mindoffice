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
                <a class="nav-link knopje" href="{{ route('projects.create') }}"><h2 class="knoptekst">Create new project</h2></a>
            </li>
        </ul>
    </nav>

    <table class="table table-striped infotabel">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td scope="row">{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td class="details"><a href="{{ route('projects.show',$project->id) }}"><h2 class="knoptekst">Details</h2></a></td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
