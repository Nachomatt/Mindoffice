@extends('layouts.app')


@section('content')
    @can('manage project members')
        <div class="container text-white">
            <form action="{{route('projects.projectmembers.store',$project->id)}}" method="post">
                @csrf
                <h2 class=" text-white text-center">All Users</h2>
                <div class="card bg-dark border-top border-left border-bottom">
                    <div class="row mr-0">
                        @foreach($users as $key => $user)
                            <div class=" col-4 col-lg-3 col-sm-4  border-right wow fadeInLeft"
                                 data-wow-delay="{{ $key * 0.015 }}s">
                            <span>{{$user->name}}: <input type="checkbox" name="users[]"
                                                          value="{{$user->id}}"></span><br>
                            </div>

                        @endforeach
                    </div>
                </div>

                <br>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-primary mr-2" href="{{route('projects.show',$project->id)}}">Go Back</a>
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    @else
    @endcan
@endsection

