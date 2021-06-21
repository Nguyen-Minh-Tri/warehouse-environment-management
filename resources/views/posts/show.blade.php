@extends('layouts.app')

@section('content')
{{-- start section --}}

<a href="/posts" class="btn btn-default">Go Back</a>
<h1>{{$post->title}}</h1>
{{-- created time and user --}}
<div style="; margin-top:-15px;text-align: center; ">
    <small>Created on {{$post->created_at}}</small>
    </div>
{{-- <img style="width:100px" src="/storage/cover_images/thumb.{{$post->cover_image}}"> --}}
<br><br>
<div>
    @php
        $request = $post->id;
        echo($request['devcieID']);
    @endphp
</div>
{{-- add device button --}}
<a href="/devices/create" class="btn btn-primary">Add device</a> <br>

{{-- load all devices --}}
<hr>
@if (isset($allDevices)) {
    <div>"all devices"</div>
}
@elseif (isset($idDevices))
@foreach ($idDevices as $device)
    @if (($device->DeviceName) == "TEMP-HUMID")
        {{-- @php
        print_r($device)
        @endphp --}}
        <div id="load_tweets" style="float: left; height: 20em; width: 47%;margin-top: 2.5%; margin-left: 2.5%;background-color: rgba(148, 148, 148, 0.116); padding:30px; border: 3px solid; border-radius: 15px;">
        <h3 > Temperature - Humidity No.{{$device->id}} -- Warehouse {{$services1['services'][0]}} </h3>
        <div id="links">
            {{-- <ul class="list-group col-md-6" id="inform">
                <li class="list-group-item">ID: {{$device->id}}</li>
                <li class="list-group-item">Device Name: {{$services1['services'][1]}}</li>
                <li class="list-group-item">Temperature: {{$services1['services'][2][0].$services1['services'][2][1]}}</li>
                <li class="list-group-item">Humidity: {{$services1['services'][3][0].$services1['services'][3][1]}}</li>
            </ul> --}}
            <div style="padding-top: -20px">
                <section class="col-md-11"> 
                    <svg class="radial-progress" data-percentage="{{$services1['services'][3][0]}}" viewBox="0 0 100 90">
                    <circle class="incomplete" cx="55" cy="50" r="35"></circle>
                    <text class="percentage" x="50%" y="47%" transform="matrix(0, 1, -1, 0, 100, 0)">{{$services1['services'][2][0].$services1['services'][2][1]}}</text>
                    <text class="percentage" x="50%" y="67%" transform="matrix(0, 1, -1, 0, 100, 0)">&nbsp {{$services1['services'][3][0].$services1['services'][3][1]}}</text>
                    </svg>
                </section>
            </div>
        </div>
        </div>
    @endif

    {{-- LCD display screen --}}
    @if (($device->DeviceName) == "LCD")
    <div style=" float: left; height: 20em; width: 47%;margin-top: 2.5%; margin-left: 2.5%;background-color: rgba(148, 148, 148, 0.116); padding:30px; border: 3px solid; border-radius: 15px;">

        <h3 > LCD display No.{{$device->id}} -- Warehouse {{$services1['services'][0]}} </h3>
        <div id="links">
            <form action="{{ url('handle-form') }}" method="POST" role="form">
                {{ csrf_field()}}
                <div class="form-group">
                    <input type="text" name="LCDMsg" class="form-control" id="LCDMsg" placeholder="Input field">
                </div>
                <input type="button" class="btn btn-primary" value="Send" onclick="sendToLCD()">
            </form>
        </div>
    </div>
    @endif

    {{-- Sound display arlert --}}
    @if (($device->DeviceName) == "SPEAKER")
    <div style="float: left; height: 20em; width: 47%;margin-top: 2.5%; margin-left: 2.5%;background-color: rgba(148, 148, 148, 0.116); padding:30px; border: 3px solid; border-radius: 15px;">

        <h3 > Speaker No.{{$device->id}} -- Warehouse {{$services1['services'][0]}} </h3>
        <div id="links">
            <input style="float: left; width: 30%; margin-left: 70px; color: white;background-color: rgb(14, 167, 14);" type="button" value="Turn on" onclick='rmSpeakerOn()'>
            <input style="float: left; width: 30%; margin-left: 30px; color: white;background-color: rgb(255, 73, 73);" type="button" value="Turn off" onclick='rmSpeakerOff()'>
            <div style="float: left; width: 30%; padding-left: 30px;" id="late_content"></div>
        </div>
    </div>
    @endif


    {{-- Pump controller --}}
    @if (($device->DeviceName) == "RELAY")
    <div style="float: left; height: 20em; width: 47%;margin-top: 2.5%; margin-left: 2.5%;background-color: rgba(148, 148, 148, 0.116); padding:30px; border: 3px solid; border-radius: 15px;">

        <h3 > Water Pump Controller (Relay) No.{{$device->id}} -- Warehouse {{$services1['services'][0]}} </h3>
        <div id="links">
            <input style="float: left; width: 30%; margin-left: 70px; color: white;background-color: rgb(14, 167, 14);" type="button" value="Turn on" onclick='controlRelayOn()'>
            <input style="float: left; width: 30%; margin-left: 30px; color: white;background-color: rgb(255, 73, 73);" type="button" value="Turn off" onclick='controlRelayOff()'>
            <div style="float: left; width: 30%; padding-left: 30px;" id="late_content"></div>
        </div>
    </div>
    @endif
@endforeach
@endif


{{-- end section --}}
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>  
<script>
function rmSpeakerOn() {
    let name = "speaker";
    let     mess = "1000";
    $.ajax({
    type: "GET",
    url: '/speaker', // This is what I have updated
    data:{
          name:name,
          mess:mess
    }
}).done(function( msg ) {
    // $('#late_content').html(msg);
    alert(msg);
});
};


function rmSpeakerOff() {
    let name = "speaker";
    let     mess = "0";
    $.ajax({
    type: "GET",
    url: '/speaker', // This is what I have updated
    data:{
          name:name,
          mess:mess
    }
}).done(function( msg ) {
    // $('#late_content').html(msg);
    alert(msg);
});
};



function sendToLCD() {
    let name = "lcd";
    let     mess = $("input[name=LCDMsg]").val();;
    $.ajax({
    type: "GET",
    url: '/speaker', // This is what I have updated
    data:{
          name:name,
          mess:mess
    }
}).done(function( msg ) {
    // $('#late_content').html(msg);
    alert(msg);
});
};



function controlRelayOn() {
    let name = "relay";
    let     mess = "1";
    $.ajax({
    type: "GET",
    url: '/speaker', // This is what I have updated
    data:{
          name:name,
          mess:mess
    }
}).done(function( msg ) {
    // $('#late_content').html(msg);
    alert(msg);
});
};


function controlRelayOff() {
    let name = "relay";
    let     mess = "0";
    $.ajax({
    type: "GET",
    url: '/speaker', // This is what I have updated
    data:{
          name:name,
          mess:mess
    }
}).done(function( msg ) {
    // $('#late_content').html(msg);
    alert(msg);
});
};

setInterval(function(){//setInterval() method execute on every interval until called clearInterval()
  $('#load_tweets').fadeIn("slow");
 }, 1000);

</script>
@endsection