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
use App\Model\User;

Route::group(['middleware' => 'checksession'], function () {

    Route::group(['middleware' => 'checkinfo'], function () {
        Route::get('/', function () {
            return view('home');
        })->name('slat');
    });

    Route::get('info', function () {
        return view('info');
    })->name('info');

    Route::post('/updateAvt', 'UserController@updateAvt');
    Route::post('/updateEmail', 'UserController@updateEmail');
});

Route::get('test', function(){
   $a = User::Test();
   return $a;
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

Route::get('logout', function(){
    session()->forget('role');
    session()->forget('user');
    return redirect()->to('login');
});
