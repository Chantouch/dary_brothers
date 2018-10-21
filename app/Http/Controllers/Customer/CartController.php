<?php

namespace App\Http\Controllers\Customer;

use App\Http\Requests\Cart\UpdateRequest;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CartController extends Controller
{

    public function index(): View
    {
        $productCarts = Cart::instance('shopping')->content();

        return view('customer.cart', [
            'carts' => $productCarts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, $id)
    {
        $product = Cart::instance('shopping')->update($id, $request->quantity);
        return response()->json([
            'message' => 'Cart has been updated successful.',
            'product' => $product
        ]);
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart()
    {
        Cart::instance('shopping')->destroy();
        $notification = [
            'message' => 'Thanks! Item was cleared from cart!',
            'alert-type' => 'success'
        ];
        return redirect()->route('customer.dashboard')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('shopping')->remove($id);
        $notification = [
            'message' => 'Thanks! Item has been removed!',
            'alert-type' => 'success'
        ];
        alert()->success('Product has been remove from cart', 'Good bye!')->autoclose();
        return redirect()->route('customer.dashboard')->with($notification);
    }


    /**
     * Switch item from shopping cart to wishlist.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function switchToWishlist($id)
    {
        $item = Cart::instance('shopping')->get($id);
        Cart::instance('shopping')->remove($id);
        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });
        if (!$duplicates->isEmpty()) {
            $notification = [
                'message' => 'Thanks! Item is already in your Wishlist!',
                'alert-type' => 'success'
            ];
            return redirect('products/carts')->with($notification);
        }
        Cart::instance('wishlist')->add($item->id, $item->name, $item->qty, $item->price)
            ->associate(Product::class);
        $notification = [
            'message' => 'Thanks! Item was removed from your Wishlist!',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
