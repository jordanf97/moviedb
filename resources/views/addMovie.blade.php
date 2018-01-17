@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Adding Movie</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <style>
                    .form-group {
                        margin-bottom:15px !important;
                    }
                </style>
                <div class="panel-body">
                    <form method="POST">

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Title:</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Synopsis:</label>

                            <div class="col-md-6">
                                <input id="synopsis" type="text" class="form-control" name="synopsis" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Actors: *comma separated</label>

                            <div class="col-md-6">
                                <input id="actors" type="text" class="form-control" name="actors" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Genres: *comma separated</label>

                            <div class="col-md-6">
                                <input id="genres" type="text" class="form-control" name="genres" required>
                            </div>
                        </div>

                        <input type="hidden" name="api_token" value="{{$user->api_token}}" />
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Movie
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
