@extends ('layouts.app')

@section('content')



    <h1 class="text-center text-white">Projects</h1>
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
    @can('Moderate Website')
        <nav class="nav d-flex justify-content-center">
            <ul class="nav">
                <li>
                    <a class="nav-link btn btn-dark btn-outline-light mb-4" href="{{ route('projects.create') }}"><h2 class="text-center">Create new
                            project</h2></a>
                </li>
            </ul>
        </nav>
    @endcan
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
        @foreach($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td class="details"><a href="{{ route('projects.show',$project->id) }}"><h2 class="btn btn-dark btn-outline-light">Details</h2></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
