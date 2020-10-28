@extends('layouts.app')
@section('content')
<h1>Articles</h1>
@if(count($articles)>0)
    @foreach($articles as $article)
        <div class="well">
             
             
        {{Form::open(['action'=>['App\Http\Controllers\ArticlesController@destroy',$article->id],'method'=>'POST','class'=>'pull-right'])}}
 
        <a href="/articles/{{$article->id}}">{{$article->naziv}}</a>
        <img src='storage/slike/{{$article->slika}}' height=40px width=40px>
        <a href='/articles/{{$article->id}}/edit' class='btn btn-warning'>Edit</a>
        {{Form::hidden('_method','DELETE')}}
       {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
       {!!Form::close()!!} 
        
        </div>
    @endforeach
    {{$articles->links()}}
    @else
    <p>No posts found</p>
@endif
<a href="/articles/create" class='btn btn-success'>Insert new item</a>
@endsection