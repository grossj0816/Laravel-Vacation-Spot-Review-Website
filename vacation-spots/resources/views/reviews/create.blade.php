@extends('layouts.app')
@section('content')
<h1>Create Review</h1>
{!!Form::open(['action' => ['ReviewsController@store', $spot->id], 'method' => 'POST'])!!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', auth()->user()->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('comment', 'Comment')}}
        {{Form::text('comment', '', ['class' => 'form-control', 'placeholder' => 'Comment'])}}        
    </div>
    {{Form::submit('Create Review', ['class' => 'btn btn-primary'])}}    
{!!Form::close()!!}   

@endsection