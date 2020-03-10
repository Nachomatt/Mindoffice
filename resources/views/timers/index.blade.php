@extends('layouts.app')
@can('see projects')
@section('content')
    @foreach($timers as $t)
        <div class="col-3 mb-2">
            <div class="card card-body bg-dark text-white">

                <br>
                <p>Hours logged: {{$t->time}}  </p>
                <p>Timer belongs to: {{$t->user->name}} </p>
                @if($t->project)
                <p>Project: {{$t->project->name}} </p>
                @endif
                <p class="text-white">Timer start: {{$t->created_at}} </p>
                <a class="aanpassen btn btn-success w-75 mb-1"
                   href="{{route('timers.start',[$t->id])}}">Start Timer</a>
                <a class="aanpassen btn btn-success w-75 mb-1"
                   href="{{route('timers.pause',[$t->id])}}">Pause Timer</a>
                <a class="aanpassen btn btn-success w-75 mb-1"
                   href="{{route('timers.stop',[$t->id])}}">Stop Timer</a>
                <a class="aanpassen btn btn-success w-75 mb-1"
                   href="{{route('timers.log',[$t->id])}}">Log worked time</a>
            </div>
        </div>
    @endforeach
@endsection
@endcan
