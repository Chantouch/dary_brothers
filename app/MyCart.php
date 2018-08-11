<?php

namespace App;

use App\Product;
use App\Http\Models\ProductModel;
use App\Http\Models\CartModel;
use Illuminate\Database\Eloquent\Model;

class MyCart extends Model
{
	protected $table = 'MyCarts';
    public $timestamps = false;

    public function getCartListByUserId($userId) {
    	$carts = MyCart::where('user_id', $userId)->get();
    	$cartList = array();
    	foreach ($carts as $cart) {
    		$productModel = $this->getProductModel($cart->pro_id);
    		$cartModel = new CartModel($productModel, $cart->quantity, $cart->id);
    		array_push($cartList, $cartModel);
    	}
    	return $cartList;
    }

    public function saveCart($userId, $proId, $quantity) {
    	$existCartItem = MyCart::where('user_id', $userId)->where('pro_id', $proId)->get();
    	if (count($existCartItem) == 0) {       
    		$cart = new MyCart;
			$cart->pro_id = $proId;
			$cart->quantity = $quantity;
			$cart->user_id = $userId;

			$cart->save();
    	} else {
    		$quantity += $existCartItem[0]->quantity;
    		$this->updateQuantity($userId, $proId, $quantity);
    	}
    }

    public function updateQuantity($userId, $proId, $quantity) {
    	MyCart::where('user_id', $userId)
    		->where('pro_id', $proId)
    		->update(['quantity' => $quantity]);
    }

    public function removeCartByCartId($userId, $proId) {
    	MyCart::where([
    		['user_id', $userId],
    		['pro_id', $proId]
    	])->delete();
    }

    public function removeAll($userId) {
    	MyCart::where('user_id', $userId)->delete();
    }

    private function getProductModel($proId) {
    	$productModel = (new Product())->findProduct($proId);
    	return $productModel;
    }

}
