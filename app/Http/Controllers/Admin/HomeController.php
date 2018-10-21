<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $sevenDays = Carbon::now()->addDay(7);
        $orders = PurchaseOrder::with('products')->count();
        $newOrders = PurchaseOrder::with('products')
            ->where('created_at', '>', $sevenDays)->count();
        $customers = Customer::with('ordersHistory')->count();
        $newCustomers = Customer::with('ordersHistory')
            ->where('created_at', '>', $sevenDays)->count();
        $products = Product::with('type')->count();
        $newProducts = Product::with('type')
            ->where('created_at', '>', $sevenDays)->count();
        $latestMessages = Contact::where('created_at', '>', $sevenDays)->get();

        $users = User::paginate(50);

        return view('admin.home', [
            'orders' => $orders,
            'newOrders' => $newOrders,
            'customers' => $customers,
            'newCustomers' => $newCustomers,
            'products' => $products,
            'newProducts' => $newProducts,
            'latestMessages' => $latestMessages,
            'users' => $users
        ]);
    }

    /**
     * @return array
     */
    public function getLineChart()
    {
        $date = Carbon::now();
        $sales = DB::table('purchases')
            ->select(DB::raw('LPAD(MONTH(purchases.created_at), 2, 0) as month, SUM(total) as sales'))
            ->whereYear('purchases.created_at', '=', $date->format('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $current_date = [];
        $value = [];
        foreach ($sales as $item) {
            array_push($current_date, $item->month);
            $value[$item->month] = $item;
        }
        $data_sale = [];

        for ($m = 1; $m <= 12; $m++) {
            $time = mktime(12, 0, 0, $m, 01, $date->format('Y'));
            $list = date('m', $time);
            if (in_array($list, $current_date)) {
                $data_sale[] = $value[$list];
            } else {
                array_push($data_sale, [
                    "sales" => 0,
                    'month' => date('m', $time),
                    'id' => 0
                ]);
            }
        }
        return [
            'sales' => $data_sale
        ];
    }
}
