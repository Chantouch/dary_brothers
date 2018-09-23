<?php

namespace App\Http\Controllers\Customer;

use App\Http\Requests\CheckOut\StoreRequest;
use App\Jobs\SendNewOrderedEmail;
use App\Jobs\SendOrderCompleteEmail;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\PurchaseOrder;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $customer = '';

        if ($this->auth->check()) {

            $user_id = $this->auth->id();

            $customer = Customer::find($user_id);
        }

        $find_exist_customer = Customer::where('phone_number', '=', $request->input('phone_number'))
            ->orWhere('email', '=', $request->input('email'))->first();

        if (!$this->auth->check() && !$find_exist_customer) {

            $customer = new Customer(array_filter($request->all()));

            $customer->setPasswordAttribute($request->input('phone_number'));

            $customer->save();

            $this->auth->loginUsingId($customer->id, true);
        }

        $user_id = $customer->id;

        $total = Cart::total();
        $products = Cart::content();

        $purchase = new Purchase($request->all());
        $purchase->total = str_replace(',', '', $total);
        $purchase->order_reference = $this->randomId();
        $purchase->status = 5;
        $purchase->customer()->associate($user_id);
        if ($purchase->save()) {
            $ids = [];
            foreach ($products as $product) {
                $purchase = PurchaseOrder::create([
                    'purchase_id' => $purchase->id,
                    'product_id' => $product->id,
                    'qty' => $product->qty,
                ]);
                $ids[] = $product->id;
                if (!$purchase) {
                    return response()->json(['error' => 'Can not order now']);
                }
            }
            dispatch(new SendNewOrderedEmail($customer, $products));
            dispatch(new SendOrderCompleteEmail($customer, $products));
            Cart::destroy();
        }
        DB::commit();
        alert()->success('Your order is completed!', 'Thanks!')->autoclose();
        return redirect()->route('customer.dashboard');
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
