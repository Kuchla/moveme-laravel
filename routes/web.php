<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Site\HomeController@index')->name('site.home');

Route::get('/place/show/{place}', 'Site\HomeController@placeShow')->name('site.place.show');

Route::get('/event/filter', 'Site\HomeController@eventFilter')->name('site.event.filter');
Route::get('/event/filter-reset', 'Site\HomeController@eventFilterReset')->name('site.event.filter-reset');

Route::get('/place/filter', 'Site\HomeController@placeFilter')->name('site.place.filter');
Route::get('/place/filter-reset', 'Site\HomeController@placeFilterReset')->name('site.place.filter-reset');


Route::group(['middleware' => 'admin_auth:admin', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::resource('/places', 'PlaceController')->names('admin.places');
    Route::resource('/cities', 'CityController')->names('admin.cities');
    Route::resource('/activities', 'ActivityController')->names('admin.activities');
    Route::resource('/events', 'EventController')->names('admin.events');
    Route::resource('/admins', 'AdminController')->names('admin.admins');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Site'], function () {
    Route::get('/profile', 'ProfileController@index')->name('site.profile');
    Route::post('/profile/store', 'ProfileController@store')->name('site.profile.store');
    Route::patch('/profile/update/{profile}', 'ProfileController@update')->name('site.profile.update');
});

Auth::routes();

Route::group([
    'namespace' => 'Admin\Auth',
    'middleware' => 'admin_guest',
    'prefix' => 'admin'
], function () {
    Route::get('login', 'LoginController@showLoginForm')
        ->name('admin.login');

    Route::post('login', 'LoginController@login');
});

Route::group([
    'namespace' => 'Admin\Auth',
    'middleware' => 'admin_auth',
    'prefix' => 'admin'
], function () {
    Route::post('logout', 'LoginController@logout')
->name('admin.logout');
});

Route::post('admin/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('admin.password.update');
Route::get('admin/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');


