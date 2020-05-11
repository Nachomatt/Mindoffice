@extends('layouts.app')
@can('see projects')
@section('content')
    <h1 class="text-center text-white">Your worked hours, {{Auth::user()->name}}</h1>
    <div class="container d-flex justify-content-center">
        <div class="card bg-dark text-white w-50">
            <form class="text-white" action="{{route('timers.sendlog',$timer->id)}}" method="post">
                @csrf
                Time logged: {{$timer->formattedTime}}
                <p>Timer belongs to: {{$timer->user->name}} </p>
                <p>Project:
                    <select name="project_id" required>
                        @foreach($projects as $p)
                            <option value="{{$p->id}}">{{$p->name}}</option>
                        @endforeach
                    </select>
                </p>
                <button class="btn btn-success float-left mr-1" type="submit">Submit</button>
                <a class="btn btn-primary" href="{{route('timers.index')}}">Go Back</a>
            </form>

        </div>
    </div>
@endsection
@endcan
