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
use App\Model\Major;
use App\Model\Event;

Route::group(['middleware' => 'checksession'], function () {

    Route::group(['middleware' => 'checkinfo'], function () {
        Route::get('/', function () {
            return view('home');
        })->name('slat');
        Route::get('change-pass', function () {
            return view('changePass');
        });
        Route::get('class', function () {
            return view('class');
        });
        Route::get('class-chat', function () {
            return view('classChat');
        });
        Route::get('note', function () {
            return view('note');
        });
        Route::get('send-question', function () {
            return view('sendQuestion');
        });
        Route::get('statistic', function () {
            return view('statistic');
        });
        Route::get('create-post', function () {
            return view('addPost');
        });
        Route::get('list-event', 'EventController@index');
        Route::get('list-event/search-event', 'EventController@searchEvent');
        Route::post('create-event', 'EventController@createEvent');
        Route::post('update-event', 'EventController@updateEvent');
        Route::post('delete-many-event', 'EventController@deleteManyEvent');
        Route::post('delete-event', 'EventController@deleteEvent');
        Route::get('list-expert', function () {
            return view('listExpert');
        });
        Route::get('list-lecturer', function () {
            return view('listLecturer');
        });
        Route::get('list-post', function () {
            return view('listPost');
        });
        Route::get('list-post-pending', function () {
            return view('listPostPending');
        });
        Route::get('list-question-subject', function () {
            return view('listQuestionSubject');
        });
        Route::get('list-rule', function () {
            return view('listRule');
        });
        Route::get('list-student', function () {
            return view('listStudent');
        });
        Route::get('list-subject', function () {
            return view('listSubject');
        });
    });

    Route::get('info', function () {
        $majors = Major::all();
        return view('info', ['majors' => $majors]);
    })->name('info');

    Route::post('/updateAvt', 'UserController@updateAvt');
    Route::post('/updateEmail', 'UserController@updateEmail');
    Route::post('/updateInfo', 'UserController@updateInfo');
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

Route::get('index', 'UserController@index');
Route::get('test', function(){
    return view('test');
});