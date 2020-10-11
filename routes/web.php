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

//Front End
Route::get('/', 'Front\HomeController@index')->name('home');
Route::get('/login', 'Front\UserManagementController@index')->name('login');
Route::post('/login', 'Front\UserManagementController@process_login');
Route::get('/register', 'Front\UserManagementController@register')->name('register');
Route::post('/register', 'Front\UserManagementController@process_signup');

Route::get('/changePassword', 'Front\UserManagementController@changePassword');
Route::post('/changePassword', 'Front\UserManagementController@process_changePassword')->name('register');

Route::get('/forgotPassword', 'Front\UserManagementController@forgotPassword');
Route::post('/forgotPassword', 'Front\UserManagementController@process_forgotPassword')->name('register');

Route::get('logout','Front\UserManagementController@logout')->name('logout');

Route::get('/restaurant','Front\HomeController@restaurant')->name('restaurant');
Route::get('/restaurant/{id}','Front\HomeController@restaurantDetail')->name('restaurant.deatil');
Route::get('/view/{id}/foodItems','Front\HomeController@listItems');
Route::get('/book/{id}/seats','Front\HomeController@bookSeats')->name('bookSeats');
Route::get('/add-to-cart/{category_id}/{fooditem_id}', 'Front\HomeController@addToCart');
Route::get('/cart','Front\HomeController@goToCart');
Route::get('/clear-cart','Front\HomeController@clearCart');
Route::get('/clear-item/{item_id}','Front\HomeController@clearItem');
Route::post('/update-cart','Front\HomeController@updateCart');
Route::post('/checkout','Front\HomeController@goToCheckout');
Route::post('/complete-order', 'Front\HomeController@process_order')->name('process.order');
Route::post('/reservation', 'Front\HomeController@process_saveReservation')->name('process.reservation');

//Back end
Route::get('/admin', 'Admin\UserManagementController@index')->name('adminlogin');
Route::get('/admin/login', 'Admin\UserManagementController@index');
Route::post('/admin/login', 'Admin\UserManagementController@process_login');

Route::get('/admin/register', 'Admin\UserManagementController@register')->name('adminregister');
Route::post('/admin/register', 'Admin\UserManagementController@process_signup');

Route::get('/admin/changePassword', 'Admin\UserManagementController@changePassword');
Route::post('/admin/changePassword', 'Admin\UserManagementController@process_changePassword')->name('adminregister');

Route::get('/admin/forgotPassword', 'Admin\UserManagementController@forgotPassword');
Route::post('/admin/forgotPassword', 'Admin\UserManagementController@process_forgotPassword')->name('adminregister');


Route::get('/admin/logout','Admin\UserManagementController@logout')->name('adminlogout');
Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name('admindashboard');


Route::get('/admin/category', 'Admin\CategoryManagementController@index')->name('categoryList');
Route::get('/admin/addCategory', 'Admin\CategoryManagementController@addCategory');
Route::post('/admin/saveCategory', 'Admin\CategoryManagementController@process_saveCategory');
Route::get('/admin/{id}/editCategory', 'Admin\CategoryManagementController@editCategory');
Route::post('/admin/updateCategory', 'Admin\CategoryManagementController@process_updateCategory');
Route::get('/admin/deleteCategory', 'Admin\CategoryManagementController@process_deleteCategory');

Route::get('/admin/{id}/viewItems', 'Admin\CategoryManagementController@viewItems');
Route::get('/admin/{id}/addItem', 'Admin\CategoryManagementController@addItem');
Route::post('/admin/saveItem', 'Admin\CategoryManagementController@process_saveItem');
Route::get('/admin/{id}/editItem', 'Admin\CategoryManagementController@editItem');
Route::post('/admin/updateItem', 'Admin\CategoryManagementController@process_updateItem');
Route::get('/admin/deleteItem', 'Admin\CategoryManagementController@process_deleteItem');


Route::get('/admin/orders', 'Admin\OrderManagementController@index')->name('orders');
Route::get('/admin/order-detail/{order}', 'Admin\OrderManagementController@orderDetail')->name('order.delivered');
Route::get('/admin/order/delivered/{order}', 'Admin\OrderManagementController@markDelivered')->name('order.delivered');
Route::get('/admin/order/completed/{order}', 'Admin\OrderManagementController@markCompleted')->name('order.completed');

Route::get('/admin/reservation', 'Admin\ReservationManagementController@index')->name('reservationList');
Route::get('/admin/addReservation', 'Admin\ReservationManagementController@addReservation');
Route::post('/admin/saveReservation', 'Admin\ReservationManagementController@process_saveReservation');
Route::get('/admin/{id}/editReservation', 'Admin\ReservationManagementController@editReservation');
Route::post('/admin/updateReservation', 'Admin\ReservationManagementController@process_updateReservation');
Route::get('/admin/deleteReservation', 'Admin\ReservationManagementController@process_deleteReservation');



Route::get('/admin/setting', 'Admin\SettingController@index')->name('adminsettings');

Route::post('/admin/savesettings', 'Admin\SettingController@process_settings');

