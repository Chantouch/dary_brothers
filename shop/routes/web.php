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

Route::get('lang/{language}', 'LanguageController@switchLang')->name('lang.switch');

Auth::routes();

Route::get('/', 'Frontend\HomeController@index')->name('fronted.home');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/home', 'Admin\HomeController@index')->name('home');

    Route::resource('categories', 'Admin\CategoryController');

    Route::resource('types', 'Admin\TypeController');

    Route::resource('products', 'Admin\ProductController');

    Route::resource('media', 'MediaLibraryController')->only(['index', 'show', 'create', 'store', 'destroy']);

});


Route::resource('carts', 'Frontend\ShoppingCartController');
