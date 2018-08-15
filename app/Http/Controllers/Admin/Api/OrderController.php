<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Purchase $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Purchase $order)
    {
        $order->fill($request->all());
        $order->save();
        return response()->json(['message' => 'Order has been updated.']);
    }
}
