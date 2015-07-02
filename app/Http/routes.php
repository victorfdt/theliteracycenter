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

/** PAGES */
get('about', array('as' => 'pages.about', 'uses' => 'PagesController@about'));
get('/', array('as' => '/', 'uses' => 'PagesController@index'));
$router->resource('pages', 'PagesController', ['except' => ['pages']]);


/** USERS */
get('users/edit/{id}', array('as' => 'users/edit', 'uses' => 'UsersController@edit'));
post('users/store', array('as' => 'users/store', 'uses' => 'UsersController@store'));
patch('users/update/{id}', array('as' => 'users/update', 'uses' => 'UsersController@update'));
get('users/destroy/{id}', array('as' => 'users/destroy', 'uses' => 'UsersController@destroy'));
$router->resource('users', 'UsersController');

/** AUTHENTICATION */
get('/login', 'Auth\AuthController@getLogin');
get('/logout', 'Auth\AuthController@getLogout');
get('/password', 'Auth\PasswordController@getEmail');

/** ADMIN */
get('admin', array('as' => 'admin', 'uses' => 'AdminController@index'));
get('admin/password/edit', array('as' => 'admin/password/edit', 'uses' => 'AdminController@passwordEdit'));
patch('admin/password/update', array('as' => 'admin/password/update', 'uses' => 'AdminController@passwordUpdate'));

/** BANNER */
get('banners/edit/{id}', array('as' => 'banners/edit', 'uses' => 'BannersController@edit'));
post('banners/store', array('as' => 'banners/store', 'uses' => 'BannersController@store'));
patch('banners/update/{id}', array('as' => 'banners/update', 'uses' => 'BannersController@update'));
get('banners/destroy/{id}', array('as' => 'banners/destroy', 'uses' => 'BannersController@destroy'));
$router->resource('banners', 'BannersController');

