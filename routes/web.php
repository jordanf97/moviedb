<?php


Route::get('/', function () {
    return view('welcome');
});


Route::get('api/review/{id}', 'reviewController@show');
Route::put('api/review', 'reviewController@edit');

Route::group(['prefix' => 'api', 'middleware' => 'auth:api'], function() {
    Route::post('review', 'reviewController@store');
    Route::post('genre', 'GenreController@store');
    Route::post('actor', 'ActorController@store');
    
});

Route::group(['middleware' => 'web'], function() {
    Route::auth();

    route::get('/home', 'HomeController@index');
    route::get('/movies', 'MovieViewController@index');
});
