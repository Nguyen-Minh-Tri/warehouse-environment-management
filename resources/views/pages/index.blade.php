@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Warehouse Environment Management!</h1>
    @if (Auth::guest())    
        <div class="home-guide" style="display: inline-block">
        <p>Take a minute to make your account if not yet registered</p> 
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
        </div>
    @else 
        <p style="margin: 0 auto">Welcome {{ Auth::user()->name }}</p>
    @endif
    </div>
@endsection
