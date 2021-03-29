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

Auth::routes(['verify' => true]);

Route::prefix('auth')->group(function(){
    // Login with Google
    Route::get('google', 'Auth\LoginController@googleRedirect')->name('login.google');
    Route::get('google/callback', 'Auth\LoginController@loginWithGoogle');

    // Login with Facebook
    Route::get('facebook', 'Auth\LoginController@facebookRedirect')->name('login.facebook');
    Route::get('facebook/callback', 'Auth\LoginController@loginWithFacebook');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('event', 'EventController@index')->name('event.index');

// Route::middleware('auth', 'verified')->group(function(){
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::prefix('event')->group(function(){
        Route::get('create', 'EventController@create')->name('event.create');
        Route::get('store', 'EventController@store')->name('event.store');
        Route::get('update', 'EventController@update')->name('event.update');
        Route::get('data', 'EventController@data')->name('event.data');
        Route::get('{id}', 'EventController@show')->name('event.show');
    });
    Route::get('leaderboard', 'LeaderboardController@index')->name('leaderboard.index');
// });
