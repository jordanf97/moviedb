@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Displaying Movie</div>

                <div class="panel-body">
                <h1>{{ $movie->title }}</h1>
                <p>{{ $movie->synopsis }}</p>
                <p>Rating: {{ $movie->rating }}</p>

                <h2>Reviews</h2>
                @foreach ($reviews as $review)
                    <p> 
                        {{ $review->content }} <br />
                        Rating: {{ $review->rating }}<br />
                        @if (Auth::check() and $user->id == $review->userID)
                            <p><a href="/reviews/edit/{{ $review->id }}">Edit Your Review</a></p>
                        @endif
                    </p>
                    <hr />
                @endforeach

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Auth::check())
                    <h2>Leave A Review</h2>
                    <form method="POST">

                    <div class="form-group">
                        <label for="content" class="col-md-4 control-label">Review:</label>

                        <div class="col-md-6">
                            <input id="content" type="text" class="form-control" name="content" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rating" class="col-md-4 control-label">Rating:</label>

                        <div class="col-md-6">
                            <select id="ratig" name="rating" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>

                        <input type="hidden" name="movieID" value="{{ $movie->id }}" />
                        <input type="hidden" name="api_token" value="{{ $user->api_token }}" />
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Review
                                </button>
                            </div>
                        </div>

                    </form>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
