<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'OutController@index')->name('out');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	


	//real
	Route::get('playlist', 'PlaylistController@index')->name('playlist.index');
	Route::get('playlist/add', 'PlaylistController@add')->name('playlist.add');
	Route::post('playlist', 'PlaylistController@store')->name('playlist.store');
	Route::post('video', 'VideoController@store')->name('video.store');
	Route::get('video/destroy/{id}', 'VideoController@destroy')->name('video.destroy');
	Route::get('playlist/detail/{id}', 'PlaylistController@show')->name('playlist.detail');
	Route::get('playlist/destroy/{id}', 'PlaylistController@destroy')->name('playlist.destroy');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

