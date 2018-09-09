<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Type $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Type $type)
    {
        $types = (new Type())->newQuery()->where('status', '=', 1)->get();

        $products = $type->products()->where('status', 1)->paginate(20);

        return view('frontend.types.show', [
            'type' => $type,
            'types' => $types,
            'products' => $products
        ]);
    }
}
