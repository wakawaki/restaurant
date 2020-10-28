@extends('layouts.app')
@section('content')
<h1>Edit item</h1>
{!! Form::open(['action'=>['App\Http\Controllers\ArticlesController@update',$article->id],'method'=>'POST']) !!}
    {{Form::label('category','Category')}}
    {!! Form::select('category_id', $ArticleCategory, $article->category_id,['class'=>'form-control','placeholder'=>'Article category'] ) !!}<br>
    {{Form::label('naziv','Naziv')}}
    {{Form::text('naziv',$article->naziv,['class'=>'form-control','placeholder'=>'Naziv'])}}
    {{Form::label('cena','Cena')}}
    {{Form::text('cena',$article->cena,['class'=>'form-control','placeholder'=>'Cena'])}}
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection