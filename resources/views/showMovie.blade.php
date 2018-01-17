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
                        @if ($user->id == $review->userID)
                            <p><a href="/reviews/edit/{{ $review->id }}">Edit Your Review</a></p>
                        @endif
                    </p>
                    <hr />
                @endforeach

                @if (Auth::check())
                    <h2>Leave A Review</h2>
                    <form method="POST">
                        Content: <input type="text" name="content" /><br />
                        Rating: <select name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select><br />
                        <input type="hidden" name="movieID" value="{{ $movie->id }}" />
                        <input type="hidden" name="api_token" value="{{ $user->api_token }}" />
                        <input type="submit" name="submit" value="Submit" />

                    </form>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
