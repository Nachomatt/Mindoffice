@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="wow fadeInDown card bg-secondary text-white mt-5">
                <div class="card-header bg-dark text-white">Test Test 1 2 3</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       <div>Welcome, {{ Auth::user()->name }}. You are now logged in.</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
