@extends('layouts.app')
@section('content')
<h1>Tables</h1>
@if(count($tables)>0)
    @foreach($tables as $table)
        <div class="well">
             
             
        {{Form::open(['action'=>['App\Http\Controllers\TablesController@destroy',$table->id],'method'=>'POST','class'=>'pull-right'])}}
        <a href="/tables/{{$table->id}}">{{$table->naziv}}</a>
        <a href='/orderstable/{{$table->id}}' class='btn btn-warning'>Order</a>
    
       {!!Form::close()!!} 
        
        </div>
    @endforeach
    {{$tables->links()}}
    @else
    <p>No posts found</p>
@endif
<a href="/tables/create" class='btn btn-success'>Insert new table</a>
@endsection