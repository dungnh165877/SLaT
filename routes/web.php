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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function() {
	return view('login');
});

Route::get('register', function() {
	return view('register');
});
Route::get('forgot-password', function() {
    return view('forgotPassword');
});

Route::post('register', 'UserController@register');
Route::post('forgot-password', 'UserController@forgotPassword');
Route::get('reset-password', 'UserController@resetPassword');
Route::post('new-pass', 'UserController@newPassword');
