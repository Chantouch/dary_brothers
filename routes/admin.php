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

Route::resource('users', 'UserController');

Route::resource('customers', 'CustomerController');

Route::resource('sliders', 'SliderController');

Route::put('settings/ajax/{id}', 'SettingController@ajaxUpdate')->name('settings.ajax-update');

Route::resource('settings', 'SettingController', ['only' => ['index', 'edit', 'update']]);

Route::resource('contacts', 'ContactController', ['only' => ['index', 'destroy']]);
