<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = (new Category())->where('slug', $slug)->first();

        $categories = (new Category())->newQuery()->where('status', 1)->get();

        $products = $category->products()->where('status', 1)->paginate(20);

        return view('frontend.categories.index', [
            'category' => $category,
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
