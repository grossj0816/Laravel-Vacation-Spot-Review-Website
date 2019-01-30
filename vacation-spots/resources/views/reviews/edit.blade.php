@extends('layouts.app')
@section('content')
<h1>Edit Review</h1>
{{-- TODO: pass value of BOTH ids to the update &delete controller methods!!!!!! --}}
{!!Form::open(['action' => ['ReviewsController@update', $spot->id, $review->id], 'method' => 'PUT'])!!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $review->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('comment', 'Comment')}}
        {{Form::text('comment', $review->comment, ['class' => 'form-control', 'placeholder' => 'Comment'])}}
    </div>
    {{Form::submit('Edit Review',  ['class' => 'btn btn-primary'])}}
{!!Form::close()!!}
@endsection