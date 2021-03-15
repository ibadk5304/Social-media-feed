<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'App\Http\Controllers\PostController@index')->name('home');
Route::get('/home/create', 'App\Http\Controllers\PostController@create')->name('home.create');
Route::post('/home/store', 'App\Http\Controllers\PostController@store')->name('home.store');
Route::get('/home/edit/{post}', 'App\Http\Controllers\PostController@edit')->name('home.edit');
Route::patch('/home/{post}', 'App\Http\Controllers\PostController@update')->name('home.update');
Route::delete('/home/{post}', 'App\Http\Controllers\PostController@destroy')->name('home.destroy');

Route::get('/theme', 'App\Http\Controllers\ThemeController@index')->name('theme');

Route::post('theme/setThemeCookie', 'App\Http\Controllers\CookieController@setThemeCookie')
    ->name('theme.cookie');
Route::get('theme/getCookie', 'App\Http\Controllers\CookieController@getThemeCookie')
    ->name('theme.getCookie');

Route::get('/theme/show/{theme}', 'App\Http\Controllers\ThemeController@show')->name('theme.show');
Route::get('/theme/create', 'App\Http\Controllers\ThemeController@create')->name('theme.create');
Route::post('/theme/store', 'App\Http\Controllers\ThemeController@store')->name('theme.store');
Route::get('/theme/edit/{theme}', 'App\Http\Controllers\ThemeController@edit')->name('theme.edit');
Route::patch('/theme/{theme}', 'App\Http\Controllers\ThemeController@update')->name('theme.update');
Route::delete('/theme/{theme}', 'App\Http\Controllers\ThemeController@destroy')->name('theme.destroy');


//use it for user controll
//    Add manage users to AuthService provider
//->middleware('can:manage-users')
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')
    ->group(function(){
    Route::resource('/users', 'UsersController');

});
