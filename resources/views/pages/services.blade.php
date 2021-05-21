@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
        <ul class="list-group">
            <li class="list-group-item">ID: {{$services[0]}}</li>
            <li class="list-group-item">Name: {{$services[1]}}</li>
            <li class="list-group-item">Temperature: {{$services[2]}}</li>
            <li class="list-group-item">Humidity: {{$services[3]}}</li>
        </ul>
@endsection