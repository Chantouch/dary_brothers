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

//Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::resource('categories', 'CategoryController');

Route::resource('types', 'TypeController');

Route::resource('products', 'ProductController');

Route::resource('media', 'MediaLibraryController')->only(['index', 'show', 'create', 'store', 'destroy']);

Route::get('orders', 'OrderController@index')->name('orders.index');
Route::put('orders/{order}', 'OrderController@update')->name('orders.update');

Route::resource('users', 'UserController');

Route::resource('customers', 'CustomerController');

Route::resource('sliders', 'SliderController');
