@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                <h1>{{ $movie->title }}</h1>
                <p>{{ $movie->synopsis }}</p>
                <p>Rating: {{ $movie->rating }}</p>

                <h2>Reviews</h2>
                @foreach ($reviews as $review)
                    <p> 
                        <a href="/movies/{{ $movie->id }}">{{ $review->content }}</a> <br />
                        Rating: {{ $review->rating }}<br />
                        Ratng: {{ $review->rating }}
                    </p>
                    <hr />
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
