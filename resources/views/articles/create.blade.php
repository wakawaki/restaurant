@extends('layouts.app')
@section('content')
<h1>Insert new Article</h1>


{!! Form::open(['action'=>'App\Http\Controllers\ArticlesController@store','method'=>'POST','enctype'=>'multipar/form-data','files' => true]) !!}
    {{Form::label('category','Category')}}
    {!! Form::select('category_id', $ArticleCategories, null,['class'=>'form-control','placeholder'=>'Item category name'] ) !!}<br>
    {{Form::label('naziv','Table name')}}
    {{Form::text('naziv','',['class'=>'form-control','placeholder'=>'Naziv'])}}
    {{Form::label('cena','Cena')}}
    {{Form::text('cena','',['class'=>'form-control','placeholder'=>'Cena'])}}
    {{Form::file('slika')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection