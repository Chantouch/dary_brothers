<?php

namespace App\Http\Controllers\Admin\Api;

use App\Jobs\SendPaymentStatusEmail;
use App\Mail\UpdatePaymentStatus;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $purchase = Purchase::with('customer')->find($id);

        $customer = $purchase->customer;

        $purchase_items = PurchaseOrder::wherePurchaseId($purchase->id)->get();

        if ($request->get('status') === '4') {
            foreach ($purchase_items as $purchase_item) {
                Product::whereId($purchase_item->product_id)->decrement('qty', $purchase_item->qty);
            }
        }

        if ($request->get('status') !== '4' && $purchase->status === 4) {
            foreach ($purchase_items as $products) {
                Product::whereId($products->product_id)->increment('qty', $products->qty);
            }
        }

        $purchase->update($request->all());

//        dispatch(new SendPaymentStatusEmail($customer, $purchase));
        Mail::send(new UpdatePaymentStatus($customer, $purchase));

        return response()->json(['message' => 'Order has been updated.']);
    }
}
