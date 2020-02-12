@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Test Test 1 2 3</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       <div class="text-dark">Welcome, {{ Auth::user()->name }}. You are now logged in.</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
