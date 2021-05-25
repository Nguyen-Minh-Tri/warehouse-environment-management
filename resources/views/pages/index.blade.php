@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Warehouse Environment Management!</h1>
    @if (Auth::guest())    
    <div></div>
        <p>Take a minute to make your account if not yet registered</p> 
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
    
        @else 
        <p>Welcome {{ Auth::user()->name }}</p>
    @endif
    </div>

    <a href="https://youtube.com">
    <button href = "#" style= "border: 2px solid rgb(122, 122, 122);border-radius: 25px;">
        <div class="card" style="width: 32rem;" >
            <img class="card-img-top" style="width: 30rem;border: 2px solid #ccc; border-radius: 25px;" src="https://znews-photo.zadn.vn/w660/Uploaded/pirr/2019_12_28/01_1_.jpg" alt="Card image cap">
            <div class="card-body">
            <p class="card-text">Building B4 at HCMUT</p>
            </div>
        </div>
    </button>
    </a>

@endsection
