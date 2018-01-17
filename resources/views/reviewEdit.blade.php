@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editing Review</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel-body">
                    <form method="POST">

                        <div class="form-group">
                            <label for="content" class="col-md-4 control-label">Review:</label>

                            <div class="col-md-6">
                                <input id="content" type="text" class="form-control" name="content" value="{{ $review->content }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rating" class="col-md-4 control-label">Rating:</label>

                            <div class="col-md-6">
                                <select id="ratig" name="rating" class="form-control">
                                    <option value="{{ $review->rating }}" selected>{{ $review->rating }}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $review->id }}" />
                        <input type="hidden" name="api_token" value="{{ $user->api_token }}" />
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit Review
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
