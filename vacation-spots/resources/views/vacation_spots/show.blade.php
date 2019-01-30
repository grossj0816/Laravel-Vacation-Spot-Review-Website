@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="well">
                <h1>{{$spot->location}}</h1>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="well">
            @foreach ($reviews as $review)
                @if ($spot->id == $review->spot_id)
                    <div class="well">
                        <h3>{{$review->name}}</h3>
                        <p>{{$review->comment}}</p>
                        @if (!Auth::guest())
                            @if (auth()->user()->id == $review->user_id)
                                <a href="/{{$spot->id}}/reviews/{{$review->id}}/edit" class="btn btn-primary">Edit Review</a>
                                {!!Form::open(['action' => ['ReviewsController@destroy', $spot->id, $review->id], 'method' => 'DELETE', 'class' => 'pull-right'])!!}
                                    {{Form::submit('Delete Review', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            @endif
                        @endif
                    </div>
                @endif
            @endforeach 
            @if (!Auth::guest())
                <a href="/{{$spot->id}}/reviews/create" class="btn btn-primary">Create Review</a>
            @endif  
        </div>

    </div>
</div>
@endsection