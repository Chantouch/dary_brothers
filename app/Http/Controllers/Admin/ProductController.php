<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use App\Transformers\ProductTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * @var ProductTransformer
     */
    private $transformer;

    /**
     * ProductController constructor.
     * @param ProductTransformer $transformer
     */
    public function __construct(ProductTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = (new Product)->newQuery()->latest()->paginate(20);
        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = (new Type())->newQuery()->where('status', '=', 1)->get()->pluck('name', 'id')->toArray();
        $categories = (new Category())->newQuery()->get()->pluck('name', 'id')->toArray();
        return view('admin.products.create', [
            'types' => $types,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();

        $product = new Product($request->all());
        $product->{'name:en'} = $request->input('en_name');
        $product->{'description:en'} = $request->input('en_description');
        $product->{'name:kh'} = $request->input('kh_name');
        $product->{'description:kh'} = $request->input('kh_description');

        $product->type()->associate($request->input(('type_id')));

        $saved = $product->save();

        $product->categories()->attach($request->get('categories'));

        if ($saved && $request->hasFile('images')) {
            foreach ($request->file('images') as $photo) {
                $product->addMedia($photo)
                    ->toMediaCollection('product-images');
            }

        }

        DB::commit();
        return redirect()->route('admin.products.index')->with('success', 'Product has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $types = (new Type())->newQuery()->where('status', '=', 1)->get()->pluck('name', 'id')->toArray();
        $categories = (new Category())->newQuery()->get()->pluck('name', 'id')->toArray();
        $product_categories = $product->categories()->get()->pluck('id', 'name')->toArray();

        $images = [];

        if ($product->hasMedia('product-images')) {
            $images = $product->getMedia('product-images');
        }

        return view('admin.products.edit', [
            'product' => $this->transformer->transform($product),
            'types' => $types,
            'categories' => $categories,
            'product_categories' => $product_categories,
            'images' => $images
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $product->fill(array_filter($request->all()));
        $product->{'name:en'} = $request->input('en_name');
        $product->{'description:en'} = $request->input('en_description');
        $product->{'name:kh'} = $request->input('kh_name');
        $product->{'description:kh'} = $request->input('kh_description');
        $product->type()->associate($request->input(('type_id')));
        $product->categories()->sync($request->get('categories'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $photo) {
                $product->addMedia($photo)
                    ->toMediaCollection('product-images');
            }
        }

        $product->save();
        return redirect()->route('admin.products.index')->with('success', 'The product has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success', 'Product has been deleted.');
    }
}
