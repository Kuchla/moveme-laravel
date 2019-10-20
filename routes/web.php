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


Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::resource('/places', 'PlaceController')->names('admin.places');
    Route::resource('/cities', 'CityController')->names('admin.cities');
    Route::resource('/activities', 'ActivityController')->names('admin.activities');
    Route::resource('/events', 'EventController')->names('admin.events');
});

Auth::routes();
