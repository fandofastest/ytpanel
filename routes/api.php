<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', 'ApiController@index')->name('api.index');
Route::get('/all', 'ApiController@all')->name('api.all');
Route::get('playlist/', 'ApiController@getAllPlaylist')->name('api.playlistall');
Route::get('playlist/{id}', 'ApiController@getVideosByPlaylist')->name('api.playlist');
Route::get('artist/', 'ApiController@getAllArtist')->name('api.artist');
Route::get('artistcountry/{id}', 'ApiController@getArtistbyCountry')->name('api.artistcountry');
Route::get('genre/', 'ApiController@getAllGenre')->name('api.genre');
Route::get('genre/{id}', 'ApiController@getVideosByGenre')->name('api.genredetail');
Route::get('getallcountry/', 'ApiController@getAllCountry')->name('api.getallcountry');
Route::get('search/{q}', 'ApiController@getAllCountry')->name('api.getsearch');


