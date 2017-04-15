<?php

App::bind('App\Billing\Stripe', function() {
  return new \App\Billing\Stripe(config('services.stripe.secret'));
});

//The following  three lines do the same thing.
//$stripe = App::make('App\Billing\Stripe');
//$stripe = app('App\Billing\Stripe');
$stripe = resolve('App\Billing\Stripe');

dd($stripe);

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
