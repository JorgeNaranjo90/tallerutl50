<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'users' => 'UsersController',
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


// Contruimos un grupo de rutas con un prefijo antes de,
// Esto para evitar conflictos con otros modelos.

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function(){
	Route::resource('users', 'UsersController');
});

