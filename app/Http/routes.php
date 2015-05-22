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

Route::get('/', 'WelcomeController@welcome');

Route::get('/app', 'WelcomeController@app' );
Route::get('/home', 'WelcomeController@home' );
Route::get('/dashboard', 'WelcomeController@dashboard' );

// Route::get('home', 'HomeController@index');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);

Route::resource('user', 'UserController');

Route::bind('user', function($value, $route) {
	return App\Project::whereSlug($value)->first();
});
