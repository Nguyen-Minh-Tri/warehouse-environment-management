@extends('layouts.app')

@section('content')
    <h1>Add device</h1>
    {!! Form::open(['action' => 'DevicesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('DeviceName', 'DeviceName')}}
            {{Form::select('DeviceName', array('LCD' => 'LCD', 'SPEAKER' => 'SPEAKER', 'TEMP-HUMID' => 'TEMP-HUMID', 'RELAY' => 'RELAY'))}}
        </div>
        <div class="form-group">
            {{Form::label('Description', 'Description')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        {{-- <div class="form-group">
            {{Form::file('cover_image')}}
        </div> --}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection