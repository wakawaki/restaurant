@extends('layouts.app')
@section('content')
<h1>Article categories</h1>
@if(count($ArticleCategories)>0)
    @foreach($ArticleCategories as $ArticleCategory)
        <div class="well">
             
             
        {{Form::open(['action'=>['App\Http\Controllers\ArticleCategoryController@destroy',$ArticleCategory->id],'method'=>'POST','class'=>'pull-right'])}}
        <a href="/articlecategories/{{$ArticleCategory->id}}">{{$ArticleCategory->naziv}}</a>
        <a href='/articlecategories/{{$ArticleCategory->id}}/edit' class='btn btn-warning'>Edit</a>
        {{Form::hidden('_method','DELETE')}}
       {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
       {!!Form::close()!!} 
        
        </div>
    @endforeach
    {{$ArticleCategories->links()}}
    @else
    <p>No posts found</p>
@endif
<a href="/articlecategories/create" class='btn btn-success'>Insert new article category</a>
@endsection