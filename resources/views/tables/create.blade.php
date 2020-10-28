@extends('layouts.app')
@section('content')
<h1>Insert new table</h1>


{!! Form::open(['action'=>'App\Http\Controllers\TablesController@store','method'=>'POST']) !!}
    {{Form::label('store','Store')}}
    {!! Form::select('store_id', $stores, null,['class'=>'form-control','placeholder'=>'Store name'] ) !!}<br>
    {{Form::label('naziv','Table name')}}

    {{Form::text('naziv','',['class'=>'form-control','placeholder'=>'Naziv'])}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection