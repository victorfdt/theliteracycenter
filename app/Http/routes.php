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

/*
Route::get('/', function () {
    return view('welcome');
});

*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/** PAGES ROUTES */
get('about', array('as' => 'pages.about', 'uses' => 'PagesController@about'));
get('/', array('as' => '/', 'uses' => 'PagesController@index'));
$router->resource('pages', 'PagesController',
                ['except' => ['pages']]);


/** USERS ROUTES */
get('adminlogin', 'UsersController@adminLogin');
get('admin', array('as' => 'admin', 'uses' => 'UsersController@adminHome'));
$router->resource('users', 'UsersController');

