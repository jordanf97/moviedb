<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('movies', 'MovieController@index');
Route::get('movies/{id}', 'MovieController@show');
Route::post('movies', 'MovieController@store');

Route::get('actor/{movieID}', 'ActorController@index');
Route::post('actor', 'ActorController@store');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
