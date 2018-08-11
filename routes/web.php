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

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', 'HomeController@index');

Route::get('/products', 'ProductsController@index');

Route::get('/products/{page}', 'ProductsController@toPage');

Route::get('/product_detail/{id}', 'ProductsController@productDetail');

Route::get('/account/create_form', function () {
  return view('account.profile_create');
});

Route::post('/account/create', 'ProfileController@createUser');

Route::post('/account/create_user_detail', 'ProfileController@createUserDetail');

Route::get('/account/log_out', 'Auth\LoginController@logout');

Route::get('/shop', 'ShopController@index');

Route::get('/account/login_user', function () {
  return view('auth.login');
});

Route::post('/account/login', 'Auth\LoginController@login');

Auth::routes();

Route::get('/test', function() {
	return view('account.profile_edit');
});

Route::get('/my_cart', 'MyCartController@index');

Route::get('/my_cart_add/{id}/quantity/{quantity}', 'MyCartController@addToCart');

Route::get('/my_cart_edit/{id}/quantity/{quantity}', 'MyCartController@editCartItemQuantity');

Route::get('/my_cart_remove/{id}', 'MyCartController@removeFromCart');
