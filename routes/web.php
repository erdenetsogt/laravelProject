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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
  Route::get('/callback/{provider}', 'SocialController@callback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/import_excel', 'KhanDansController@create');
Route::post('/imports', 'KhanDansController@importABC');
Route::get('/id', 'KhanDansController@showId');