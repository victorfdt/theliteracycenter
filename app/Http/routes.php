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
get('editpassword', array('as' => 'editpassword', 'uses' => 'Auth\PasswordController@editPassword'));
patch('/passwordupdate', array('as' => '/passwordupdate', 'uses' => 'Auth\PasswordController@updatePassword'));


/** USERS */
get('users/edit/{id}', array('as' => 'users/edit', 'uses' => 'UsersController@edit'));
post('users/store', array('as' => 'users/store', 'uses' => 'UsersController@store'));
patch('users/update/{id}', array('as' => 'users/update', 'uses' => 'UsersController@update'));
get('users/destroy/{id}', array('as' => 'users/destroy', 'uses' => 'UsersController@destroy'));
$router->resource('users', 'UsersController');


/** ################ ADMIN SECTION ################ */

/** ADMIN */
get('admin', array('as' => 'admin', 'uses' => 'AdminController@index'));
get('admin/password/edit', array('as' => 'admin/password/edit', 'uses' => 'AdminController@passwordEdit'));
patch('admin/password/update', array('as' => 'admin/password/update', 'uses' => 'AdminController@passwordUpdate'));

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

/** WISHLIST */
get('wishlist/edit/{id}', array('as' => 'wishlist/edit', 'uses' => 'WishListController@edit'));
post('wishlist/store', array('as' => 'wishlist/store', 'uses' => 'WishListController@store'));
patch('wishlist/update/{id}', array('as' => 'wishlist/update', 'uses' => 'WishListController@update'));
get('wishlist/destroy/{id}', array('as' => 'wishlist/destroy', 'uses' => 'WishListController@destroy'));
get('wishlist/index', array('as' => 'wishlist/index', 'uses' => 'WishListController@index'));
get('wishlist/edit', array('as' => 'wishlist/edit', 'uses' => 'WishListController@edit'));
get('wishlist/create', array('as' => 'wishlist/create', 'uses' => 'WishListController@create'));
get('donate/wishlist', array('as' => 'donate/wishlist', 'uses' => 'WishListController@displayWishList'));
get('wishlist/status/{id}', array('as' => 'wishlist/status', 'uses' => 'WishListController@changeStatus'));

/** JOB OPPORTUNITIES */
get('job/edit/{id}', array('as' => 'job/edit', 'uses' => 'JobOpportunitiesController@edit'));
post('job/store', array('as' => 'job/store', 'uses' => 'JobOpportunitiesController@store'));
patch('job/update/{id}', array('as' => 'job/update', 'uses' => 'JobOpportunitiesController@update'));
get('job/destroy/{id}', array('as' => 'job/destroy', 'uses' => 'JobOpportunitiesController@destroy'));
get('job/index', array('as' => 'job/index', 'uses' => 'JobOpportunitiesController@index'));
get('job/edit', array('as' => 'job/edit', 'uses' => 'JobOpportunitiesController@edit'));
get('job/create', array('as' => 'job/create', 'uses' => 'JobOpportunitiesController@create'));
get('job/status/{id}', array('as' => 'job/status', 'uses' => 'JobOpportunitiesController@changeStatus'));
get('job/show/{id}', array('as' => 'job/show', 'uses' => 'JobOpportunitiesController@show'));
get('about/jobOpportunities', array('as' => 'about/jobOpportunities', 'uses' => 'JobOpportunitiesController@jobDisplay'));

/** INDEX PAGE */
get('indexpage/edit/{id}', array('as' => 'indexpage/edit', 'uses' => 'IndexPageController@edit'));
post('indexpage/store', array('as' => 'indexpage/store', 'uses' => 'IndexPageController@store'));
patch('indexpage/update/{id}', array('as' => 'indexpage/update', 'uses' => 'IndexPageController@update'));
get('indexpage/destroy/{id}', array('as' => 'indexpage/destroy', 'uses' => 'IndexPageController@destroy'));
get('indexpage/index', array('as' => 'indexpage/index', 'uses' => 'IndexPageController@index'));
get('indexpage/edit', array('as' => 'indexpage/edit', 'uses' => 'IndexPageController@edit'));
get('indexpage/create', array('as' => 'indexpage/create', 'uses' => 'IndexPageController@create'));
get('indexpage/show/{id}', array('as' => 'indexpage/show', 'uses' => 'IndexPageController@show'));
get('indexpage/status/{id}', array('as' => 'indexpage/status', 'uses' => 'IndexPageController@changeStatus'));
get('/', array('as' => '/', 'uses' => 'IndexPageController@displayPosts'));
get('/index', array('as' => '/index', 'uses' => 'IndexPageController@displayPosts'));

/** ################ VOLUNTEER SECTION ################ */

/** VOLUNTEER */
get('volunteer', array('as' => 'volunteer', 'uses' => 'VolunteerController@index'));

/** MONTHLY REPORT */
get('monthlyreport/edit/{id}', array('as' => 'monthlyreport/edit', 'uses' => 'MonthlyReportController@edit'));
post('monthlyreport/store', array('as' => 'monthlyreport/store', 'uses' => 'MonthlyReportController@store'));
patch('monthlyreport/update/{id}', array('as' => 'monthlyreport/update', 'uses' => 'MonthlyReportController@update'));
get('monthlyreport/destroy/{id}', array('as' => 'monthlyreport/destroy', 'uses' => 'MonthlyReportController@destroy'));
get('monthlyreport/index', array('as' => 'monthlyreport/index', 'uses' => 'MonthlyReportController@index'));
get('monthlyreport/edit', array('as' => 'monthlyreport/edit', 'uses' => 'MonthlyReportController@edit'));
get('monthlyreport/create', array('as' => 'monthlyreport/create', 'uses' => 'MonthlyReportController@create'));
get('monthlyreport/show/{id}', array('as' => 'monthlyreport/show', 'uses' => 'MonthlyReportController@show'));
get('monthlyreport/status/{id}', array('as' => 'monthlyreport/status', 'uses' => 'MonthlyReportController@changeStatus'));

/** ################ PAGES SECTION ################ */
/** PAGES */
$router->resource('pages', 'PagesController', ['except' => ['pages']]);
Route::get('/{name}', 'PagesController@goToPage');
Route::get('/{section}/{name}', 'PagesController@goToSectionPage');