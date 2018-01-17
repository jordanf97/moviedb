@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Movies</div>

                <div class="panel-body">
                <a href="/movie/add">Add new?</a>
                <hr />
                @foreach ($movies as $movie)
                    <p> 
                        <a href="/movies/{{ $movie->id }}">{{ $movie->title }}</a> <br />
                        {{ $movie->synopsis }}<br />
                        Ratng: {{ $movie->rating }}
                    </p>
                    <hr />
                @endforeach

                <a href="/movie/add">Add new?</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
