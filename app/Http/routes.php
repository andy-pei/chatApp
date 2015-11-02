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
Route::get('posts/create', 'PostsController@create');
Route::post('posts/store', 'PostsController@store');
Route::get('posts/delete/{id}', 'PostsController@destroy');
Route::get('posts/edit/{id}', 'PostsController@edit');
Route::post('posts/store/{id}', 'PostsController@update');


//routes for post types
Route::get('post-types', 'PostTypesController@index');
Route::get('post-types/create', 'PostTypesController@create');
Route::post('post-types/store', 'PostTypesController@store');

