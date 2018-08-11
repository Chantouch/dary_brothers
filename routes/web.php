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

Route::get('/', 'Frontend\HomeController@index')->name('frontend.home');

Route::resource('carts', 'Frontend\ShoppingCartController');
