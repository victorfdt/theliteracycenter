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
$router->resource('pages', 'PagesController', ['except' => ['pages']]);


/** USERS ROUTES */
get('editPassword', 'UsersController@editPassword');

$router->resource('users', 'UsersController');

/** AUTHENTICATION */
Route::get('/login', 'Auth\AuthController@getLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');
Route::get('/password', 'Auth\PasswordController@getEmail');

/** ADMIN */
get('admin', array('as' => 'admin', 'uses' => 'AdminController@index'));
get('admin/account', array('as' => 'admin/account', 'uses' => 'AdminController@account'));
get('admin/account/show/{id}', array('as' => 'admin/account/show', 'uses' => 'AdminController@accountShow'));
get('admin/account/create', array('as' => 'admin/account/create', 'uses' => 'AdminController@accountCreate'));
get('admin/account/delete/{id}', array('as' => 'admin/account/delete', 'uses' => 'AdminController@accountDestroy'));
get('admin/account/edit/{id}', array('as' => 'admin/account/edit', 'uses' => 'AdminController@accountEdit'));
post('admin/account/store', array('as' => 'admin/account/store', 'uses' => 'AdminController@accountStore'));
patch('admin/account/update/{id}', array('as' => 'admin/account/update', 'uses' => 'AdminController@accountUpdate'));
get('admin/password/edit', array('as' => 'admin/password/edit', 'uses' => 'AdminController@passwordEdit'));
patch('admin/password/update', array('as' => 'admin/password/update', 'uses' => 'AdminController@passwordUpdate'));

