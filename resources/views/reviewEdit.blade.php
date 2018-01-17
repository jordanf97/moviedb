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
                        Content: <input type="text" name="content" value="{{$review->content}}" /><br />
                        Rating:  <input type="number" name="rating" value="{{$review->rating}}" />
                        </select><br />
                        <input type="hidden" name="id" value="{{ $review->id }}" />
                        <input type="hidden" name="api_token" value="{{ $user->api_token }}" />
                        <input type="submit" name="submit" value="Submit" />

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
