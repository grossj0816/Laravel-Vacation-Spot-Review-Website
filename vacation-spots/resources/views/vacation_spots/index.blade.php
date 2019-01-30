@extends('layouts.app')
@section('content')
<h1>Vacation Spots</h1>
<div class="row">
    @foreach ($spots as $spot)
        <div class="well">
            <h3><a href="/vacation_spots/{{$spot->id}}">{{$spot->location}}</a></h3>
        </div>
    @endforeach    
</div>
<div class="row">
    @if(!Auth::guest())
    <a href="/vacation_spots/create" class="btn btn-primary">Create a Vacation Spot</a>
    @endif
</div>
<br /> 
@endsection