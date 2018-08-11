<?php namespace App\Http\Models;

class CartModel extends ProductModel {

	public $cartId = 0;
	public $quantity = 0;

	public function __construct($product, $qty, $cartId) {
		parent::__construct($product->id, $product->title, $product->description, $product->image_paths, $product->price);
		$this->cartId = $cartId;
		$this->quantity = $qty;
	}

	public function pro_quantity() {
		return "Quantity: " . $this->quantity;
	}

	public function pro_totalPrice() {
		return 'Total: $' . $this->totalPrice();
	}

	private function totalPrice() {
		return $this->quantity * $this->price;
	}

}