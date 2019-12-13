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

Route::get('/eventos', 'Site\EventController@index')->name('site.event.index');
Route::get('/eventos/filtro', 'Site\EventController@eventFilter')->name('site.event.filter');

Route::get('/pontos-turisticos', 'Site\PlaceController@index')->name('site.place.index');
Route::get('/pontos-turisticos/filtro', 'Site\PlaceController@placeFilter')->name('site.place.filter');

Route::get('/atividades', 'Site\ActivityController@index')->name('site.activity.index');

Route::get('/usuarios', 'Site\UserController@index')->name('site.user.index');
Route::get('/usuarios/filtro', 'Site\UserController@userFilter')->name('site.user.filter');

Route::group(['middleware' => 'auth', 'namespace' => 'Site'], function () {
    Route::get('/perfis', 'ProfileController@index')->name('site.profile');
    Route::post('/perfis/salvar', 'ProfileController@store')->name('site.profile.store');
    Route::delete('/perfis/{user}', 'ProfileController@destroy')->name('site.profile.destroy');
    Route::patch('/perfis/atualizar/{profile}', 'ProfileController@update')->name('site.profile.update');
    Route::resource('/comentarios', 'CommentController')->names('site.comments');
});

Auth::routes();

Route::group(['middleware' => 'admin_auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::resource('/places', 'PlaceController')->names('admin.places');
    Route::resource('/cities', 'CityController')->names('admin.cities');
    Route::resource('/activities', 'ActivityController')->names('admin.activities');
    Route::resource('/events', 'EventController')->names('admin.events');
    Route::resource('/admins', 'AdminController')->names('admin.admins');
});

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

