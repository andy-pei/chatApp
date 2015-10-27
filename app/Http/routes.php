<?php

//Route::get('/', function () {
//    return view('welcome');
//});

//

Route::get('/', 'WelcomeController@index');
Route::get('/chat', 'ChatController@index');
Route::post('/chat', 'ChatController@store');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::post('/typing', 'ChatController@typing');

//routes for posts
Route::get('posts', 'PostsController@index');
