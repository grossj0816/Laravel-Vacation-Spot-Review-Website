@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="jumbotron text-center">
            <h1>Welcome to Fire Vacation Spots</h1>
            @if (Auth::guest())
                <a href="/login" class="btn btn-primary">Login</a>
                <a href="/register" class="btn btn-primary">Register</a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="row">
            @foreach ($spots as $spot)
                <div class="well">
                    <h3><a href="/vacation_spots/{{$spot->id}}">{{$spot->location}}</a></h3>
                </div>
            @endforeach    
        </div>
    </div>
@endsection