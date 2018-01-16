<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::get('api/review/{id}', 'reviewController@show');
Route::put('api/review', 'reviewController@edit');

Route::group(['prefix' => 'api', 'middleware' => 'auth:api'], function() {
    Route::post('review', 'reviewController@store');
    
});

Route::group(['middleware' => 'web'], function() {
    Route::auth();

    route::get('/home', 'HomeController@index');
});
