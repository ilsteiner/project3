<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'IndexController')->name('app.index');

Route::get('/lorem/', 'LoremController@create')->name('lorem.create');

Route::post('/lorem/', 'LoremController@store')->name('lorem.store');

Route::get('/user/', 'UserController@create')->name('user.create');

Route::post('/user/', 'UserController@store')->name('user.store');
