@extends('layouts.app')
@section('content')
<h1>Edit table</h1>
{!! Form::open(['action'=>['App\Http\Controllers\TablesController@update',$table->id],'method'=>'POST']) !!}
    {{Form::label('store','Store')}}
    {!! Form::select('store_id', $stores, $table->store_id,['class'=>'form-control','placeholder'=>'Store name'] ) !!}<br>
    {{Form::label('naziv','Naziv')}}
    {{Form::text('naziv',$table->naziv,['class'=>'form-control','placeholder'=>'Naziv'])}}
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection