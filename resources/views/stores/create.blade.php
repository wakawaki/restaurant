@extends('layouts.app')
@section('content')
<h1>Insert new store</h1>
{!! Form::open(['action'=>'App\Http\Controllers\StoresController@store','method'=>'POST']) !!}
    {{Form::label('naziv','Naziv')}}
    {{Form::text('naziv','',['class'=>'form-control','placeholder'=>'Naziv'])}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection