<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index()
    {

        $products = (new Product())->newQuery()->where('status', 1)->paginate(20);

        $categories = (new Category())->newQuery()->where('status', 1)->get();

        return view('frontend.products.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
