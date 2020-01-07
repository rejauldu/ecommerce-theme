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
	Route::get('users-management', 'Backend\UserController@management')->name('users-management');
	Route::resource('categories', 'Backend\CategoryController');
	Route::resource('payments', 'Backend\PaymentController');
	Route::resource('suppliers', 'Backend\SupplierController');
	Route::resource('notifications', 'Backend\NotificationController');
	Route::resource('divisions', 'Backend\Locations\DivisionController');
	Route::resource('districts', 'Backend\Locations\DistrictController');
	Route::resource('upazilas', 'Backend\Locations\UpazilaController');
	Route::resource('unions', 'Backend\Locations\UnionController');
	Route::resource('regions', 'Backend\Locations\RegionController');
	Route::resource('sizes', 'Backend\SizeController');
	Route::resource('colors', 'Backend\ColorController');
	Route::resource('products', 'Backend\ProductController');
	Route::resource('order-statuses', 'Backend\OrderStatusController');
	Route::resource('shippers', 'Backend\ShipperController');
	Route::resource('orders', 'Backend\OrderController');
	Route::get('orders-incomplete', 'Backend\OrderController@incomplete')->name('orders.incomplete');
	Route::get('/clear-cache', function() {
		Artisan::call('cache:clear');
		return redirect('/dashboard');
	});
});
