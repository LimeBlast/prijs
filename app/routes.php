<?php

# Home
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

# Registration
Route::get('/register', ['as' => 'registration.create', 'uses' => 'RegistrationController@create'])->before('guest');
Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);

# Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::post('login', ['as' => 'sessions.store', 'uses' => 'SessionsController@store']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

# Profile
Route::get('/{profile}', ['as' => 'profiles.show', 'uses' => 'ProfilesController@show']);
Route::resource('profiles', 'ProfilesController', ['only' => ['edit', 'update']]);