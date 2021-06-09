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
	//artist
	Route::get('artist', 'ArtistController@index')->name('artist.index');
	Route::get('artist/add', 'ArtistController@add')->name('artist.add');
	Route::post('artist', 'ArtistController@store')->name('artist.store');
	Route::get('artist/destroy/{id}', 'ArtistController@destroy')->name('artist.destroy');

	//genre

	Route::get('genre', 'GenreController@index')->name('genre.index');
	Route::get('genre/add', 'GenreController@add')->name('genre.add');
	Route::post('genre', 'GenreController@store')->name('genre.store');
	Route::get('genre/detail/{id}', 'GenreController@show')->name('genre.detail');
	Route::get('genre/destroy/{id}', 'GenreController@destroy')->name('genre.destroy');






});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

