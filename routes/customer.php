<?php

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::delete('carts/empty', 'CartController@emptyCart')->name('carts.empty');
Route::resource('carts', 'CartController', ['only' => ['destroy', 'index']]);
Route::post('switch-to-wish-list/{id}', 'CartController@switchToWishlist')->name('switch.wishlist');

Route::delete('empty-wish-list', 'WishlistController@emptyWishlist')->name('wish-lists.empty');
Route::resource('wish-lists', 'WishlistController');
Route::post('switch-to-cart/{id}', 'WishlistController@switchToCart')->name('switch.cart');
