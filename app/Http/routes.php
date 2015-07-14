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

/** AUTHENTICATION */
get('/login', 'Auth\AuthController@getLogin');
get('/logout', 'Auth\AuthController@getLogout');
get('/password', 'Auth\PasswordController@getEmail');

/** USERS */
get('users/edit/{id}', array('as' => 'users/edit', 'uses' => 'UsersController@edit'));
post('users/store', array('as' => 'users/store', 'uses' => 'UsersController@store'));
patch('users/update/{id}', array('as' => 'users/update', 'uses' => 'UsersController@update'));
get('users/destroy/{id}', array('as' => 'users/destroy', 'uses' => 'UsersController@destroy'));
$router->resource('users', 'UsersController');

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

/** MEMBER */
get('member/edit/{id}', array('as' => 'member/edit', 'uses' => 'MembersController@edit'));
post('member/store', array('as' => 'member/store', 'uses' => 'MembersController@store'));
patch('member/update/{id}', array('as' => 'member/update', 'uses' => 'MembersController@update'));
get('member/destroy/{id}', array('as' => 'member/destroy', 'uses' => 'MembersController@destroy'));
get('member/index', array('as' => 'member/index', 'uses' => 'MembersController@index'));
get('member/edit', array('as' => 'member/edit', 'uses' => 'MembersController@edit'));
get('member/create', array('as' => 'member/create', 'uses' => 'MembersController@create'));
get('about/staff', array('as' => 'about/staff', 'uses' => 'MembersController@staff'));
get('about/boardofdirectors', array('as' => 'about/boardofdirector', 'uses' => 'MembersController@boardOfdirector'));

/** PAGES */
$router->resource('pages', 'PagesController', ['except' => ['pages']]);
Route::get('/', 'PagesController@index');
Route::get('/{name}', 'PagesController@goToPage');
Route::get('/{section}/{name}', 'PagesController@goToSectionPage');