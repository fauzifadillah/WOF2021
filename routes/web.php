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

Auth::routes(['verify' => true]);

Route::prefix('auth')->group(function(){
    // Login with Google
    Route::get('google', 'Auth\LoginController@googleRedirect')->name('login.google');
    Route::get('google/callback', 'Auth\LoginController@loginWithGoogle');

    // Login with Facebook
    Route::get('facebook', 'Auth\LoginController@facebookRedirect')->name('login.facebook');
    Route::get('facebook/callback', 'Auth\LoginController@loginWithFacebook');
});

// Route::middleware('auth', 'verified')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/event', 'EventController@index')->name('event');
// });
