<?php

namespace App\Http\Controllers\Customer;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $productCarts = Cart::instance('shopping')->content();

        // dd($productCarts);

        return view('customer.cart', [
            'carts' => $productCarts
        ]);
    }
}
