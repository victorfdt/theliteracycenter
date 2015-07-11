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
$router->resource('pages', 'PagesController', ['except' => ['pages']]);
Route::get('/', 'PagesController@index');
Route::get('/{name}', 'PagesController@goToPage');
Route::get('/student/{name}', 'PagesController@goToStudentPage');
Route::get('/volunteer/{name}', 'PagesController@goToVolunteerPage');


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
get('banners/status/{id}', array('as' => 'banners/status', 'uses' => 'BannersController@changeStatus'));
$router->resource('banners', 'BannersController');

/** IMAGE */
get('image/edit/{id}', array('as' => 'image/edit', 'uses' => 'ImagesController@edit'));
post('image/store', array('as' => 'image/store', 'uses' => 'ImagesController@store'));
patch('image/update/{id}', array('as' => 'image/update', 'uses' => 'ImagesController@update'));
get('image/destroy/{id}', array('as' => 'image/destroy', 'uses' => 'ImagesController@destroy'));
get('image/status/{id}', array('as' => 'image/status', 'uses' => 'ImagesController@changeStatus'));
get('image/index', array('as' => 'image/index', 'uses' => 'ImagesController@index'));
get('image/edit', array('as' => 'image/edit', 'uses' => 'ImagesController@edit'));
get('image/create', array('as' => 'image/create', 'uses' => 'ImagesController@create'));