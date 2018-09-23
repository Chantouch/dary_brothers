<?php

Route::resource('checkouts', 'CheckOutController', ['only' => ['store']]);
Route::resource('carts', 'CartController', ['only' => ['destroy', 'index', 'update']]);
