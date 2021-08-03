@extends('layouts.app')

@section('content')

    <h1>Temperature in last 20 times</h1>

    <svg viewBox="0 0 500 100" class="chart" style="border-left: 2px solid black;border-bottom: 2px solid black;">

    <polyline fill="none" stroke="#0074d9" stroke-width="2" points="
         60,{{90-$data[0]}}
         80,{{90-$data[1]}}
         100,{{90-$data[2]}}
         120,{{90-$data[3]}}
         140,{{90-$data[4]}}
         160,{{90-$data[5]}}
         180,{{90-$data[6]}}
         200,{{90-$data[7]}}
         220,{{90-$data[8]}}
         240,{{90-$data[9]}}
         260,{{90-$data[10]}}
         280,{{90-$data[11]}}
         300,{{90-$data[11]}}
         320,{{90-$data[12]}}
         340,{{90-$data[13]}}
         360,{{90-$data[14]}}
         380,{{90-$data[15]}}
         400,{{90-$data[16]}}
         420,{{90-$data[17]}}
         440,{{90-$data[18]}}
         460,{{90-$data[19]}}
       " />
       
    </svg>

    <h1>{{$predict[0]}}</h1>

@endsection


