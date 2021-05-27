@extends('layouts.app')

@section('content')

    <h1>{{$title}}</h1>
        <form method="POST" action="PagesControllers@send_to_ada">
            <input type="text" id = "search" placeholder="Device name or ID" style="border: 2px solid rgb(122, 122, 122);border-radius: 10px; padding:5px">
            <button style="border: 2px solid rgb(122, 122, 122);border-radius: 10px;padding:5px">Search</button>
        </form>
        <br>
        <br>

        {{-- <div style="border: 2px solid rgb(122, 122, 122);border-radius: 25px; padding:15px; padding-bottom: 190px;"> --}}
        <h3 > Temperature - Humidity No.2</h3>
        <div id="links">
            <ul class="list-group col-md-6" id="inform">
                <li class="list-group-item">ID: {{$services[0]}}</li>
                <li class="list-group-item">Device Name: {{$services[1]}}</li>
                <li class="list-group-item">Temperature: {{$services[2][0].$services[2][1]}}</li>
                <li class="list-group-item">Humidity: {{$services[3][0].$services[3][1]}}</li>
            </ul>
            <div>
                <section class="col-md-6"> 
                    <svg class="radial-progress" data-percentage="{{$services[3][0]}}" viewBox="0 0 80 80">
                    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
                    <circle class="complete" cx="40" cy="40" r="100" style="stroke-dashoffset: 39.58406743523136;"></circle>
                    <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">{{$services[3][0].$services[3][1]}}</text>
                    </svg>
                </section>
            </div>
        {{-- </div> --}}

        
    <script type="text/javascript">
    init_reload();
    function init_reload(){
        setInterval( function() {
                   window.location.reload();
 
          },1000);
    }
    </script>


@endsection


