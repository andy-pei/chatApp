<?php

//Route::get('/', function () {
//    return view('welcome');
//});

//

Route::get('/', 'WelcomeController@index');
Route::get('/chat', 'ChatController@index');
Route::post('/chat', 'ChatController@store');

// user routes
Route::get('users/edit', 'UserController@edit');
Route::post('users/update', 'UserController@update');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::post('/typing', 'ChatController@typing');

//routes for posts
Route::get('posts', 'PostsController@index');
Route::get('posts/create', 'PostsController@create');
Route::post('posts/store', 'PostsController@store');
Route::get('posts/delete/{id}', 'PostsController@destroy');
Route::get('posts/edit/{id}', 'PostsController@edit');
Route::post('posts/store/{id}', 'PostsController@update');
Route::get('all-posts', 'PostsController@getAllPosts');
Route::get('post/{id}', 'PostsController@show');
Route::post('posts/search', 'PostsController@searchPosts');



//routes for post types
Route::get('post-types', 'PostTypesController@index');
Route::get('post-types/create', 'PostTypesController@create');
Route::post('post-types/store', 'PostTypesController@store');
Route::get('post-type/{typeId}/posts', 'PostTypesController@getPostsByType');


//routes for comments
Route::post('post/{id}/comment/create', 'CommentsController@store');