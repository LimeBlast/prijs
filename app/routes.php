<?php

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::resource('registration', 'RegistrationController');


Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');