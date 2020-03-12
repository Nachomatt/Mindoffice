@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>Unauthorized Access</title>
</head>
<body class="errorbody">

<div class="flex-column mt-5">
    <h1 class="text-center text-white">ヾ(⌐■_■)ノ♪ What the? Okay... Something went very wrong.</h1>
    <h1 class="text-center text-white">No playing with URLs, kiddo. Right. I'll get you back to the website, just go here.</h1>
    <div class="d-flex justify-content-center">
        <a class="text-white text-decoration-none" href="{{ url('/home') }}">
            <h1 class="btn btn-primary text-white text-center">Go back home</h1>
        </a>
    </div>
</div>
</body>
</html>
@endsection
