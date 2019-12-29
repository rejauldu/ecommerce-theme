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
Route::get('contact-us', 'Backend\ContactUsController@create')->name('contact-us.create');
Route::post('contact-us', 'Backend\ContactUsController@store')->name('contact-us.store');

//Routes for dashboard
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'Backend\DashboardController@dashboard')->name('dashboard');
	Route::get('/chat', 'Backend\ChatController@chat')->name('chats.chat');
	Route::resource('users', 'Backend\UserController');
	Route::resource('chats', 'Backend\ChatController');
});
Route::group(['middleware' => ['admin']], function () {
	Route::resource('user-managements', 'Backend\UserManagementController');
	Route::resource('notifications', 'Backend\NotificationController');
	Route::get('/clear-cache', function() {
		Artisan::call('cache:clear');
		return redirect('/dashboard');
	});
});
