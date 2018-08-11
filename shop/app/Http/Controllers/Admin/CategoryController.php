<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Transformers\CategoryTransformer;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var CategoryTransformer
     */
    private $transformer;

    /**
     * CategoryController constructor.
     * @param CategoryTransformer $transformer
     */
    public function __construct(CategoryTransformer $transformer)
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
        $categories = (new Category)->newQuery()->paginate(20);
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $category = new Category($request->all());
        $category->{'name:en'} = $request->input('en_name');
        $category->{'description:en'} = $request->input('en_description');
        $category->{'name:kh'} = $request->input('kh_name');
        $category->{'description:kh'} = $request->input('kh_description');
        $category->save();
        return redirect()->route('admin.categories.index')->with('success', 'The category has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $this->transformer->transform($category)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Category $category)
    {
        $category->fill($request->all());
        $category->{'name:en'} = $request->input('en_name');
        $category->{'description:en'} = $request->input('en_description');
        $category->{'name:kh'} = $request->input('kh_name');
        $category->{'description:kh'} = $request->input('kh_description');
        $category->save();
        return redirect()->route('admin.categories.index')->with('success', 'The category has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        alert()->success('The category has been deleted.', 'Good bye!')->autoclose();
        return redirect()->back();
    }
}
