<?php
//POST
Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

//TAGS
Route::get('/posts/tags/{tag}', 'TagsController@index');

//COMMENTS
Route::post('/posts/{post}/comments', 'CommentsController@store');

//REGISTRATION
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

//SESSIONS
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
