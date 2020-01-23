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
Route::resource('divisions', 'Locations\DivisionController');
Route::resource('districts', 'Locations\DistrictController');
Route::resource('upazilas', 'Locations\UpazilaController');
Route::resource('unions', 'Locations\UnionController');

//Routes for dashboard
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'Backend\DashboardController@dashboard')->name('dashboard');
	Route::resource('users', 'Backend\UserController');
	Route::resource('chats', 'Backend\ChatController');
	Route::resource('chats', 'Backend\ChatController');
	Route::resource('traffic', 'Backend\TrafficController');
	Route::get('traffic/traffic', 'Backend\TrafficController@traffic')->name('traffic.traffic');
	Route::get('notifications-user', 'Backend\NotificationController@user')->name('notifications.user');
	Route::get('orders-user', 'Backend\OrderController@user')->name('orders.user');
	
	Route::resource('categories', 'Backend\CategoryController')->middleware('moderator:Category');
	Route::resource('payments', 'Backend\PaymentController')->middleware('moderator:Payment');
	Route::resource('suppliers', 'Backend\SupplierController')->middleware('moderator:Supplier');
	Route::resource('notifications', 'Backend\NotificationController')->middleware('moderator:Notification');
	Route::resource('regions', 'Locations\RegionController')->middleware('moderator:Location');
	Route::resource('sizes', 'Backend\SizeController')->middleware('moderator:Size');
	Route::resource('colors', 'Backend\ColorController')->middleware('moderator:Color');
	Route::resource('products', 'Backend\ProductController')->middleware('moderator:Product');
	Route::resource('units', 'Backend\UnitController')->middleware('moderator:Unit');
	Route::resource('order-statuses', 'Backend\OrderStatusController')->middleware('moderator:Order Status');
	Route::resource('shippers', 'Backend\ShipperController')->middleware('moderator:Shipper');
	Route::resource('orders', 'Backend\OrderController')->middleware('moderator:Order');
	Route::resource('permissions', 'Backend\PermissionController')->middleware('moderator:Permission');
	Route::put('permissions-update', 'Backend\PermissionController@updateList')->name('permissions.update.list')->middleware('moderator:Permission');
	Route::get('orders-incomplete', 'Backend\OrderController@incomplete')->name('orders.incomplete')->middleware('moderator:Permission');
	Route::get('/clear-cache', function() {
		Artisan::call('cache:clear');
		Artisan::call('cache:clear');
		Artisan::call('view:clear');
		return redirect('/dashboard');
	});
});
