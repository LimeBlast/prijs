<?php

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

Route::get('/register', 'RegistrationController@create');
Route::resource('registration', 'RegistrationController');