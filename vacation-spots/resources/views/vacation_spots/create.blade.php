@extends('layouts.app')
@section('content')
<h1>Create Vacation Spots</h1>
{!!Form::open(['action' => 'VacationSpotsController@store', 'method' => 'POST'])!!}
    <div class="form-group">
        {{Form::label('vacation_spot', 'Vacation Spot')}}
        {{Form::text('vacation_spot', '', ['class' => 'form-control', 'placeholder' => 'Vacation Spot'])}}
    </div>
    {{Form::submit('Create Vacation Spot', ['class' => 'btn btn-primary'])}}
{!!Form::close()!!}
@endsection


