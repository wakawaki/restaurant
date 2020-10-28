@extends('layouts.app')
@section('content')
<h1>Stores</h1>
@if(count($stores)>0)
    @foreach($stores as $store)
        <div class="well">
             
             
        {{Form::open(['action'=>['App\Http\Controllers\StoresController@destroy',$store->id],'method'=>'POST','class'=>'pull-right'])}}
        <a href="/stores/{{$store->id}}">{{$store->naziv}}</a>
        <a href='/stores/{{$store->id}}/edit' class='btn btn-warning'>Edit</a>
        {{Form::hidden('_method','DELETE')}}
       {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
       {!!Form::close()!!} 
        
        </div>
    @endforeach
    {{$stores->links()}}
    @else
    <p>No posts found</p>
@endif
<a href="/stores/create" class='btn btn-success'>Insert new store</a>
@endsection