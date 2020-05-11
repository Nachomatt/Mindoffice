@extends ('layouts.app')

@section('content')

    <h1 class="mt-5 knoptekst2">Project Members</h1>
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
    <table class="table table-striped infotabel">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($project->members as $p)
            <tr>
                <td scope="row">{{ $p->id }}</td>
                <td>{{ $p->name }}</td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
