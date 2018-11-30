<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index(Request $request)
    {

        $products = (new Product())->newQuery()->where('status', 1)
            ->when($request->get('sort-price'), function ($query) use ($request) {
                $query->orderBy('price', $request->get('sort-price'));
            })
            ->when($request->get('price-level'), function ($query) use ($request) {
                $min = explode('-', $request->get('price-level'));
                $query->where('price', '>=', isset($min[0]) ? $min[0] : 0)
                    ->where('price', '<=', isset($min[1]) ? $min[1] : $min[0] + 10);
            })
            ->when($request->get('q'), function ($query) use ($request) {
                $query->whereTranslationLike('name', '%' . $request->get('q') . '%');
            })
            ->paginate(20);
        Session::flash('_old_input', $request->all());
        $getRequest = [
            'sort_price' => $request->get('sort-price'),
            'sorting_price' => $request->get('price-level')
        ];

        $categories = (new Category())->newQuery()->where('status', 1)->get();

        return view('frontend.products.index', [
            'products' => $products,
            'categories' => $categories,
            'get_request' => $getRequest
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
        $related_products = [];
        return view('frontend.products.show', [
            'product' => $product,
            'categories' => $categories,
            'types' => $types,
            'related_products' => $related_products
        ]);
    }
}
