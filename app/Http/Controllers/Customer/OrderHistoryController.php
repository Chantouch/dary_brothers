<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderHistoryController extends Controller
{
    /**
     * OrderHistoryController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $id = auth('customer')->id();

        $user = Customer::with('ordersHistory')->find($id);

        $orders = $user->ordersHistory()->get();

        // dd($orders);

        return view('customer.order-history', [
            'orders' => $orders
        ]);
    }
}
