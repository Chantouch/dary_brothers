<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Type\StoreRequest;
use App\Http\Requests\Admin\Type\UpdateRequest;
use App\Models\Type;
use App\Transformers\TypeTransformer;

class TypeController extends Controller
{
    /**
     * @var TypeTransformer
     */
    private $transformer;

    /**
     * TypeController constructor.
     * @param TypeTransformer $transformer
     */
    public function __construct(TypeTransformer $transformer)
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
        $types = (new Type)->newQuery()->latest()->paginate(20);
        return view('admin.types.index', [
            'types' => $types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $type = new Type($request->all());
        $type->{'name:en'} = $request->input('en_name');
        $type->{'description:en'} = $request->input('en_description');
        $type->{'name:kh'} = $request->input('kh_name');
        $type->{'description:kh'} = $request->input('kh_description');
        $type->save();
        return redirect()->route('admin.types.index')->with('success', 'The category has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', [
            'category' => $type
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', [
            'category' => $this->transformer->transform($type)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  \App\Models\Type $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Type $type)
    {
        $type->fill($request->all());
        $type->{'name:en'} = $request->input('en_name');
        $type->{'description:en'} = $request->input('en_description');
        $type->{'name:kh'} = $request->input('kh_name');
        $type->{'description:kh'} = $request->input('kh_description');
        $type->save();
        return redirect()->route('admin.types.index')->with('success', 'The category has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type $type
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Type $type)
    {
        $type->delete();
        alert()->success('The category has been deleted.', 'Good bye!')->autoclose();
        return redirect()->back();
    }
}
