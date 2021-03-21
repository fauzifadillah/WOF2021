<?php

// namespace App\Http\Controllers\Auth;
// namespace App\Http\Controllers;
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

<<<<<<< HEAD
=======
Route::get('auth/facebook', 'Auth\LoginController@facebookRedirect')->name('login.facebook');
Route::get('auth/facebook/callback', 'Auth\LoginController@loginWithFacebook');

>>>>>>> 77494c896db97c2b7353ff58611855349e1c0362
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
