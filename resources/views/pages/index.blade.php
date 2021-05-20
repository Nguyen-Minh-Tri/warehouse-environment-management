@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Warehouse Environment Management!</h1>
    @if (Auth::guest())    
        <p>Take a minute to make your account if not yet registered</p> 
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
    @else 
        <p>Wellcome {{ Auth::user()->name }}</p>
    @endif
    </div>

    

    
@endsection
