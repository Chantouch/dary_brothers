<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ShoppingCartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.carts.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch ($request->submit) {
            case "wishlist":
                $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($request) {
                    return $cartItem->id === $request->id;
                });
                if (!$duplicates->isEmpty()) {
                    $notification = [
                        'message' => 'Thanks! Item is already in your wishlist!',
                        'alert-type' => 'warning'
                    ];
                    return redirect()->back()->with($notification);
                }
                Cart::instance('wishlist')
                    ->add($request->id, $request->name, $request->qty, $request->price)
                    ->associate(Product::class);
                $notification = [
                    'message' => 'Thanks! Item was added to your wishlist!',
                    'alert-type' => 'success'
                ];
                return redirect()->back()->with($notification);
                break;
            case "cart":
                $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
                    return $cartItem->id === $request->id;
                });
                if (!$duplicates->isEmpty()) {
                    $notification = [
                        'message' => 'Thanks! Item is already in your cart!',
                        'alert-type' => 'warning'
                    ];
                    return redirect()->route('products.carts.index')->with($notification);
                }
                Cart::add($request->id, $request->name, $request->qty, $request->price)->associate(Product::class);
                $notification = [
                    'message' => 'Thanks! Item was added to your cart!',
                    'alert-type' => 'success'
                ];
                return redirect()->back()->with($notification);
                break;
            default:
                break;
        }
        return redirect()->route('products.carts.index')->with('error', 'Item is already added!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);
        if ($validator->fails()) {
            session()->flash('error_message', 'Quantity must be between 1 and 5.');
            return response()->json(['success' => false]);
        }
        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        $notification = [
            'message' => 'Thanks! Item has been removed!',
            'alert-type' => 'success'
        ];
        return redirect('products/carts')->with($notification);
        //return redirect('products/carts')->withSuccessMessage('Item has been removed!');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart()
    {
        Cart::destroy();
        $notification = [
            'message' => 'Thanks! Item was cleared from cart!',
            'alert-type' => 'success'
        ];
        return redirect('products/carts')->with($notification);
        //return redirect('products/carts')->withSuccessMessage('Your cart has been cleared!');
    }

    /**
     * Switch item from shopping cart to wishlist.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function switchToWishlist($id)
    {
        $item = Cart::get($id);
        Cart::remove($id);
        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });
        if (!$duplicates->isEmpty()) {
            //return redirect('products/carts')->withSuccessMessage('Item is already in your Wishlist!');
            $notification = [
                'message' => 'Thanks! Item is already in your Wishlist!',
                'alert-type' => 'success'
            ];
            return redirect('products/carts')->with($notification);
        }
        Cart::instance('wishlist')->add($item->id, $item->name, $item->qty, $item->price)
            ->associate(Product::class);
        //return redirect('products/carts')->withSuccessMessage('Item has been moved to your Wishlist!');
        $notification = [
            'message' => 'Thanks! Item was removed from your Wishlist!',
            'alert-type' => 'success'
        ];
        return redirect()->with($notification);
    }
}
