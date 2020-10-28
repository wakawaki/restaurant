@extends('layouts.app')
@section('content')
<h1>Edit article category</h1>
{!! Form::open(['action'=>['App\Http\Controllers\ArticleCategoryController@update',$ArticleCategory->id],'method'=>'POST']) !!}    
    {{Form::label('naziv','Naziv')}}
    {{Form::text('naziv',$ArticleCategory->naziv,['class'=>'form-control','placeholder'=>'Naziv'])}}
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection