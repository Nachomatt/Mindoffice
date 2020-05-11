@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>Page not found...</title>
</head>
<body>

<div class="flex-column mt-5">
    <h1 class="text-center text-white">¯\_(ツ)_/¯ No idea what you did, but this page doesn't exist friend.</h1>
    <h1 class="text-center text-white">Here you go, you can go back home here ^_^</h1>
    <div class="d-flex justify-content-center">
        <a class="text-white text-decoration-none" href="{{ url('/home') }}">
            <h1 class="btn btn-primary text-white text-center">Go back home</h1>
        </a>
    </div>
</div>
</body>
</html>
@endsection
