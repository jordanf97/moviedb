<?php

use Illuminate\Http\Request;


Route::get('movies', 'MovieController@index');
Route::get('movies/{id}', 'MovieController@show');
Route::get('actor/{movieID}', 'ActorController@index');
Route::get('genre/{movieID}', 'GenreController@index');




