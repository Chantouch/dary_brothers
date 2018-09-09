<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

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

    /**
     * @param $slug
     * @return View
     */
    public function show($slug): View
    {
        $product = (new Product())->newQuery()->where('slug', $slug)->first();
        $categories = (new Category())->newQuery()->where('status', 1)->get();
        $types = (new Type())->newQuery()->where('status', 1)->get();
        $related_products = (new Product())->newQuery()->where('type_id', $product->type->id)->get();
        return view('frontend.products.show', [
            'product' => $product,
            'categories' => $categories,
            'types' => $types,
            'related_products' => $related_products
        ]);
    }
}
