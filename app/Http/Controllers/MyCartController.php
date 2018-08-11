<?php

namespace App\Http\Controllers;

use App\MyCart;
use App\Product;
use App\User;
use App\Http\Models\CartModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MyCartController extends Controller
{

	public function index() {
		$product = new Product();
		if (Auth::check()) {
			$user = User::where('id', Auth::id())->first();
			$carts = (new MyCart())->getCartListByUserId($user->id);
			return view('my_cart', ['cartProducts' => $carts, 'email' => $user->email]);
		}
		$products = session('MY_CART');
		return view('my_cart', ["cartProducts" => $products]);
	}

	public function addToCart(Product $product, $id, $quantity) {

		if (Auth::check()) {
			(new MyCart())->saveCart(Auth::id(), $id, $quantity);
			exit;
		}

		$pro = $product->findProduct($id);
		$myCarts = session('MY_CART');

		$cartModel = new CartModel($pro, $quantity, "");

		if (empty($myCarts)) {
			session(['MY_CART' => [$cartModel]]);
			return;
		}

		if ($this->editQuantity($myCarts, $id, $quantity, "add")) {
			return;
		}

		array_push($myCarts, $cartModel);
		session(['MY_CART' => $myCarts]);
	}

	public function editCartItemQuantity($id, $quantity) {
		if (Auth::check()) {
			(new MyCart())->updateQuantity(Auth::id(), $id, $quantity);
			return response()->json(array('newQtyText' => $quantity), 200);
		}
		$myCarts = session('MY_CART');
		$cart = $this->editQuantity($myCarts, $id, $quantity, "edit");
		if ($cart === false) {
			return;
		}
		return response()->json(array('newQtyText' => $cart->pro_quantity()), 200);
	}

	private function editQuantity($myCarts, $id, $quantity, $calculation) {
		foreach ($myCarts as $cart) {
			if ($cart->id == $id) {
				if ($calculation === "add") {
					$cart->quantity += $quantity;
				} else if ($calculation === "edit") {
					$cart->quantity = $quantity;
				}
				return $cart;
			}
		}
		return false;
	}

	public function removeFromCart($id) {
		if (Auth::check()) {
			(new MyCart())->removeCartByCartId(Auth::id(), $id);
			return;
		}

		$myCarts = session('MY_CART');
		foreach ($myCarts as $cart) {
			if ($cart->id == $id) {
				$index = array_search($cart, $myCarts);
				if ($index !== false) {
					unset($myCarts[$index]);
				}
				session(['MY_CART' => $myCarts]);
				break;
			}
		}
	}

	private function clearSession() {
		session()->flush();
	}

}
