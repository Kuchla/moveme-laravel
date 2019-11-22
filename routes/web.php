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

Route::get('/events', 'Site\EventController@index')->name('site.event.index');
Route::get('/events/filter', 'Site\EventController@eventFilter')->name('site.event.filter');

Route::get('/places', 'Site\PlaceController@index')->name('site.place.index');
Route::get('/places/filter', 'Site\PlaceController@placeFilter')->name('site.place.filter');

Route::get('/activities', 'Site\ActivityController@index')->name('site.activity.index');

Route::get('/users', 'Site\UserController@index')->name('site.user.index');
Route::get('/user/filter', 'Site\UserController@userFilter')->name('site.user.filter');

Route::group(['middleware' => 'admin_auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
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
    Route::delete('/profile/{user}', 'ProfileController@destroy')->name('site.profile.destroy');
    Route::patch('/profile/update/{profile}', 'ProfileController@update')->name('site.profile.update');
    Route::resource('/comments', 'CommentController')->names('site.comments');
});

Auth::routes();

Route::group([
    'namespace' => 'Admin\Auth',
    'middleware' => 'admin_guest:admin',
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

// Route::post('admin/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
// Route::get('admin/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
// Route::post('admin/password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('admin.password.update');
// Route::get('admin/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');


