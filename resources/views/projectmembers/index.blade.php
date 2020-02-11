@extends ('layouts.app')

@section('content')



    <h1 class="mt-5 knoptekst2">Project Members</h1>
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
                <a class="nav-link knopje" href="{{ route('projectmembers.create') }}"><h2 class="knoptekst">Add Project Member</h2></a>
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
        @foreach($projectmembers as $projectmember)
            <tr>
                <td scope="row">{{ $projectmember->id }}</td>
                <td>{{ $projectmember->name }}</td>
                <td class="details"><a href="{{ route('projectmembers.show',$projectmember->id) }}"><h2 class="knoptekst">Details</h2></a></td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
