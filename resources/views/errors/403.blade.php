@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>Unauthorized Access</title>
</head>
<body class="errorbody">

<div class="flex-column mt-5">
    <h1 class="text-center text-white">ヾ(⌐■_■)ノ♪ Wait.. You're not supposed to be here. You have no acccess to
        this!</h1>
    <h1 class="text-center text-white">Right, no problem. Click here to go back to where you came from.</h1>
    <div class="d-flex justify-content-center">
        <a class="text-white text-decoration-none" href="{{ url('/home') }}">
            <h1 class="btn btn-primary text-white text-center">Go back home</h1>
        </a>
    </div>
</div>
</body>
</html>
@endsection
