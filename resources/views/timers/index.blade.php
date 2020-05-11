@extends('layouts.app')
@can('see projects')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($timers as $t)
                <div class="col-4 mb-2">
                    <div class="card card-body bg-dark text-white" timer="{{ $t->created_at != null ? 'true' : '' }}"
                         data-seconds="{{ $t->currentRawTime }}">
                        <br>
                        @if($t->currentTime)
                            <p>Time worked: <span class="values">{{$t->currentTime}}</span></p>
                        @endif

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
                        <form
                            action="{{route('timers.destroy',[$t->id])}}"
                            method="post">
                            @csrf @method('delete')
                            <button type="submit" class="btn btn-danger w-75"
                                    onclick="return confirm('Are you sure, you want to delete this timer?');">
                                Delete timer
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@endcan
