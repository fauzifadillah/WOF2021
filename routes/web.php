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

Route::middleware('auth')->group(function(){
    Route::prefix('profile')->group(function(){
        Route::get('/', 'ProfileController@index')->name('profile.index');
        Route::get('edit', 'ProfileController@edit')->name('profile.edit');
        Route::get('password', 'ProfileController@password')->name('profile.password');
        Route::get('voucher', 'ProfileController@voucher')->name('profile.voucher');
        Route::put('update', 'ProfileController@update')->name('profile.update');
        Route::put('password/update', 'ProfileController@updatePassword')->name('profile.updatePassword');
        Route::post('voucher/reedem', 'ProfileController@redeemVoucher')->name('profile.redeemVoucher');
    });

    Route::prefix('event')->group(function(){
        Route::get('create', 'EventController@create')->name('event.create');
        Route::post('store', 'EventController@store')->name('event.store');
        Route::get('edit/{id}', 'EventController@edit')->name('event.edit');
        Route::put('update/{id}', 'EventController@update')->name('event.update');
        Route::delete('delete/{id}', 'EventController@delete')->name('event.delete');
        Route::get('data', 'EventController@data')->name('event.data');
    });
    Route::prefix('category')->group(function(){
        Route::get('create', 'CategoryController@create')->name('category.create');
        Route::post('store', 'CategoryController@store')->name('category.store');
        Route::get('edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::put('update/{id}', 'CategoryController@update')->name('category.update');
        Route::delete('delete/{id}', 'CategoryController@delete')->name('category.delete');
        Route::get('data', 'CategoryController@data')->name('category.data');
    });
    Route::prefix('voucher')->group(function(){
        Route::get('/', 'VoucherController@index')->name('voucher.index');
        Route::get('create', 'VoucherController@create')->name('voucher.create');
        Route::post('store', 'VoucherController@store')->name('voucher.store');
        Route::get('edit/{id}', 'VoucherController@edit')->name('voucher.edit');
        Route::put('update/{id}', 'VoucherController@update')->name('voucher.update');
        Route::delete('delete/{id}', 'VoucherController@delete')->name('voucher.delete');
        Route::get('data', 'VoucherController@data')->name('voucher.data');
    });
    Route::prefix('account')->group(function(){
        Route::get('/', 'AccountController@index')->name('account.index');
        Route::get('create', 'AccountController@create')->name('account.create');
        Route::post('store', 'AccountController@store')->name('account.store');
        Route::get('edit/{id}', 'AccountController@edit')->name('account.edit');
        Route::put('update/{id}', 'AccountController@update')->name('account.update');
        Route::delete('delete/{id}', 'AccountController@delete')->name('account.delete');
        Route::get('data', 'AccountController@data')->name('account.data');
    });
    Route::prefix('leaderboard')->group(function(){
        Route::get('/', 'LeaderboardController@index')->name('leaderboard.index');
        Route::get('data', 'LeaderboardController@data')->name('leaderboard.data');
    });
});

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('event')->group(function(){
    Route::get('/', 'EventController@index')->name('event.index');
    Route::get('/show/{id}', 'EventController@show')->name('event.show');
    Route::get('show/{id}/checkin', 'EventController@check')->name('event.checkin');
});
