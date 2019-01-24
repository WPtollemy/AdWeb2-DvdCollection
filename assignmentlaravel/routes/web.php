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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect('/dvds');
});

Route::get('/dvds', 'DvdsController@home')->middleware('auth');

Route::get('dvds/{dvd}/edit', 'DvdsController@edit')->middleware('auth');

Route::post('/create', 'DvdsController@create')->middleware('auth');

Route::patch('dvds/{dvd}', 'DvdsController@update')->middleware('auth');

Route::delete('dvds/{dvd}', 'DvdsController@destroy')->middleware('auth');

Route::get('/search', 'DvdsController@search')->middleware('auth');

Auth::routes();
