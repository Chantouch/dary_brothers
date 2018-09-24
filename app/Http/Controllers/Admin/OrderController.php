<?php

namespace App\Http\Controllers\Admin;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = (new Purchase())->newQuery()->paginate(20);

        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Purchase $order
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $order)
    {
        return response()->json($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
