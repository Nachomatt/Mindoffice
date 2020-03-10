@extends('layouts.app')
@can('see projects')
@section('content')
    <form class="text-white" action="{{route('timers.sendlog',$timer->id)}}" method="post">
        @csrf
        Hours logged: {{$timer->time}} <input type="number" name="time" value="{{$timer->time}}">
        <p>Timer belongs to: {{$timer->user->name}} </p>
        <p>Project:
            <select name="project_id" required>
            @foreach($projects as $p)
                <option value="{{$p->id}}">{{$p->name}}</option>
            @endforeach
            </select>
        <p class="text-white">Timer start: {{$timer->created_at}} </p>
        <button class="btn btn-success float-left mt-2" type="submit">Submit</button>
    </form>
@endsection
@endcan
