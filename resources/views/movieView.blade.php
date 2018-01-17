@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                @foreach ($movies as $movie)
                    <p> 
                        <a href="/movies/{{ $movie->id }}">{{ $movie->title }}</a> <br />
                        {{ $movie->synopsis }}<br />
                        Ratng: {{ $movie->rating }}
                    </p>
                    <hr />
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
