@extends('layouts.app')

@section('content')
    <h1>ABOUT</h1>
    <ul>
        @foreach ($services as $item)
            <li>{{$item}}</li>
        @endforeach
    </ul>
@endsection