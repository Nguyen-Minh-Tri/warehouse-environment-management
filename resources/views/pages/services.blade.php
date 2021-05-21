@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
        <ul class="list-group col-md-6">
            <li class="list-group-item">ID: {{$services[0]}}</li>
            <li class="list-group-item">Name: {{$services[1]}}</li>
            <li class="list-group-item">Temperature: {{$services[2][0].$services[2][1]}}</li>
            <li class="list-group-item">Humidity: {{$services[3][0].$services[3][1]}}</li>
        </ul>
        <main>
            <section class="col-md-6"> 
                <svg class="radial-progress" data-percentage="{{$services[3][0]}}" viewBox="0 0 80 80">
                <circle class="incomplete" cx="40" cy="40" r="35"></circle>
                <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
                <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">{{$services[3][0].$services[3][1]}}</text>
                </svg> 
            </section>
        </main>
@endsection