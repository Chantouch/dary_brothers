<?php

namespace App\Http\Controllers\Customer;

use App\Http\Requests\CheckOut\StoreRequest;
use App\Jobs\SendNewOrderedEmail;
use App\Jobs\SendOrderCompleteEmail;
use App\Mail\NewOrdered;
use App\Mail\OrderCompleted;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\PurchaseOrder;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CheckOutController extends Controller
{

    private $auth;

    public function __construct()
    {
        $this->middleware('web');
        $this->auth = Auth::guard('customer');
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();

        $find_exist_customer = Customer::where('phone_number', '=', $request->input('phone_number'))
            ->orWhere('email', '=', $request->input('email'))->first();

        if (empty($find_exist_customer)) {

            $customer = new Customer(array_filter($request->all()));

            $customer->setPasswordAttribute($request->input('phone_number'));

            $customer->save();
        } else {
            $customer = $find_exist_customer;
        }
        
        $user_id = $customer->id;

        $total = Cart::instance('shopping')->total();
        $products = Cart::instance('shopping')->content();

        $purchase = new Purchase($request->all());
        $purchase->total = str_replace(',', '', $total);
        $purchase->order_reference = $this->randomId();
        $purchase->status = 5;
        $purchase->customer()->associate($user_id);
        $purchase->save();
        foreach ($products as $product) {
            $purchase = PurchaseOrder::create([
                'purchase_id' => $purchase->id,
                'product_id' => $product->id,
                'qty' => $product->qty,
            ]);
            if (!$purchase) {
                return response()->json(['error' => 'Can not order now']);
            }
        }
        dispatch(new SendNewOrderedEmail($customer, $products));
//        Mail::send(new NewOrdered($customer, (array)$products));
        dispatch(new SendOrderCompleteEmail($customer, $products));
//        Mail::send(new OrderCompleted($customer, (array)$products));
        Cart::instance('shopping')->destroy();

        DB::commit();
        alert()->success('Your order is completed!', 'Thanks!')->autoclose();
        return redirect()->route('customer.carts.index');
    }

    public function randomId()
    {
        $id = str_random(10);
        $validator = Validator::make(['order_reference' => $id], ['order_reference' => 'unique:purchases,order_reference']);
        if ($validator->fails()) {
            $this->randomId();
        }
        return $id;
    }
}
