<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'IndexController')->name(app.index);

Route::get('/lorem/', 'LoremController@create')->name(lorem.create);

Route::post('/lorem/', 'LoremController@store')->name(lorem.store);

Route::get('/user/', 'UserController@create')->name(user.create);

Route::post('/user/', 'UserController@store')->name(user.store);