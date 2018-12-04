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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/get-line-chart-data', 'HomeController@getLineChart')->name('dashboard.getLineChart');

Route::resource('categories', 'CategoryController');

Route::resource('types', 'TypeController');

Route::middleware(['optimizeImages'])->group(function () {

    Route::resource('products', 'ProductController');

});

Route::resource('media', 'MediaLibraryController')->only(['index', 'show', 'create', 'store', 'destroy']);

Route::get('orders', 'OrderController@index')->name('orders.index');

Route::resource('users', 'UserController');

Route::resource('customers', 'CustomerController');

Route::resource('sliders', 'SliderController');

Route::put('settings/ajax/{id}', 'SettingController@ajaxUpdate')->name('settings.ajax-update');

Route::resource('settings', 'SettingController', ['only' => ['index', 'edit', 'update']]);

Route::resource('contacts', 'ContactController', ['only' => ['index', 'destroy']]);
