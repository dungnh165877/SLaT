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

Route::get('login', 'UserController@getLogin');
Route::get('register', 'UserController@getRegist');
Route::get('reset-password', 'UserController@resetPassword');

Route::get('forgot-password', function() {
    return view('forgotPassword');
});

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::post('forgot-password', 'UserController@forgotPassword');
Route::post('new-pass', 'UserController@newPassword');
