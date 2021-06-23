@extends('layouts.app')

@section('content')
    <h1>Warehouse</h1>
    @if(count($devices) > 0)
        @foreach($devices as $device)
            <div class="well">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{$device->id}}">{{$device->deviceName}}</a></h3>
                        <small>Created on {{$device->created_at}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$devices->links()}}
    @else
        <p>No device found</p>
    @endif
@endsection