@extends('layouts.app')
@section('content')
<h1>Insert new article category</h1>


{!! Form::open(['action'=>'App\Http\Controllers\ArticleCategoryController@store','method'=>'POST']) !!}

   
    {{Form::label('naziv','Category name')}}
    {{Form::text('naziv','',['class'=>'form-control','placeholder'=>'Naziv'])}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection