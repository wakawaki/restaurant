@extends('layouts.app')
@section('content')
<h1>Edit store</h1>
{!! Form::open(['action'=>['App\Http\Controllers\StoresController@update',$store->id],'method'=>'POST']) !!}
    {{Form::label('naziv','Naziv')}}
    {{Form::text('naziv',$store->naziv,['class'=>'form-control','placeholder'=>'Naziv'])}}
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection