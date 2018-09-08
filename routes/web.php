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


Route::middleware('web')->namespace('Frontend')->group(function () {

    Route::get('/', 'HomeController@index')->name('frontend.home');

    Route::resource('carts', 'ShoppingCartController');

    Route::get('products/list', 'ProductController@index')->name('products.index');

    Route::get('products/{slug}', 'ProductController@show')->name('products.show');

    Route::get('categories/{slug}', 'CategoryController@show')->name('categories.show');

    Route::resource('about', 'AboutController', ['only' => ['index']]);

    Route::resource('contact', 'ContactController', ['only' => ['index', 'store']]);

});

