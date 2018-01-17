<?php


Route::get('/', function () {
    return view('welcome');
});


Route::get('api/review/{id}', 'reviewController@show');
Route::put('api/review', 'reviewController@edit');

//Routes not secured although Auth is checked within controller
route::get('/reviews/edit/{id}', 'MovieViewController@editReview');
route::get('/movies/add', 'MovieViewController@addMovie');

Route::group(['prefix' => 'api', 'middleware' => 'auth:api'], function() {
    Route::post('review', 'reviewController@store');
    Route::post('genre', 'GenreController@store');
    Route::post('actor', 'ActorController@store');
    Route::get('user', function(Request $request) {
        return response()->json($request->user());
    });
});

Route::group(['middleware' => 'web'], function() {
    Route::auth();

    route::get('/home', 'HomeController@index');
    route::get('/movies', 'MovieViewController@index');
    route::get('/movies/{id}', 'MovieViewController@view');
    
});



route::group(['middleware' => 'auth:api'], function() {
    route::post('/movies/{id}', 'MovieViewController@addReview');
    route::post('/reviews/edit/{id}', 'MovieViewController@editReviewSubmit');
    route::post('/movies/add', 'MovieViewController@addMovieSubmit');
});
