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

Route::get('/', 'FrontEnd\HomeController@index')->name('index');

Auth::routes(['verify' => true]);

//Routes for dashboard
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'BackEnd\DashboardController@dashboard')->name('dashboard');
	Route::get('/chat', 'BackEnd\ChatController@chat')->name('chat');
	Route::resource('users', 'BackEnd\UserController');
});
Route::group(['middleware' => ['admin']], function () {
	Route::get('/users', 'BackEnd\AdminController@users')->name('users');
	Route::resource('emails', 'BackEnd\EmailController');
});
