@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    Wanna see some movies? <a href="/movies">Check them out!</a>

                    <p>wanna add your own movie? <a href="/movies/add">Add it now!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
