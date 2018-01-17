@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Adding Movie</div>

                <div class="panel-body">
                    <form method="POST">
                        Title: <input type="text" name="title" /><br />
                        Synopsis: <textarea name="synopsis"></textarea><br />
                        Actors:(comma separated) <textarea name="actors"></textarea><br />
                        Genres:(comma separated) <textarea name="Genres"></textarea><br />
                        <input type="hidden" name="api_token" value="{{$user->api_token}}" />
                        <input type="submit" value="Add Movie" name="submit" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
