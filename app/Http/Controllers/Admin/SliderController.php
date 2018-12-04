<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slider\StoreRequest;
use App\Http\Requests\Admin\Slider\UpdateRequest;
use App\Models\Slider;
use App\Transformers\SliderTransformer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * @var SliderTransformer
     */
    private $transformer;

    /**
     * SliderController constructor.
     * @param SliderTransformer $transformer
     */
    public function __construct(SliderTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.sliders.index', [
            'sliders' => (new Slider())->latest()->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.sliders.create');
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
        $slider = new Slider($request->all());
        $slider->{'name:en'} = $request->input('en_name');
        $slider->{'name:kh'} = $request->input('kh_name');
        $slider->{'description:en'} = $request->input('en_description');
        $slider->{'description:kh'} = $request->input('kh_description');
        $slider->save();
        DB::commit();
        return redirect()->route('admin.sliders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('admin.sliders.show', [
            'slider' => $slider
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $image = null;
        if ($slider->hasMedia('sliders')) {
            $image = $slider->getMedia('sliders')->first();
        }
        return view('admin.sliders.edit', [
            'slider' => $this->transformer->transform($slider),
            'image' => $image
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  \App\Models\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Slider $slider)
    {
        $slider->fill($request->all());
        $slider->{'name:en'} = $request->input('en_name');
        $slider->{'name:kh'} = $request->input('kh_name');
        $slider->{'description:en'} = $request->input('en_description');
        $slider->{'description:kh'} = $request->input('kh_description');
        $media = $slider->media()->first();
        if ($request->hasFile('image')) {
            if (!empty($media)) {
                $file_path = 'public/' . $media->id . '/' . $media->file_name;
                if (Storage::disk($media->disk)->exists($file_path)) {
                    Storage::disk($media->disk)->delete($file_path);
                }
                $media->delete();
            }
            $slider->addMedia($request->file('image'))
                ->sanitizingFileName(function ($fileName) {
                    return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
                })
                ->withManipulations([
                    '*' => ['orientation' => '90'],
                ])
                ->toMediaCollection('sliders');
        }
        if (($slider->type !== 'slider' && !empty($media)) || ($slider->type !== 'banner' && !empty($media))) {
            $file_path = 'public/' . $media->id . '/' . $media->file_name;
            if (Storage::disk($media->disk)->exists($file_path)) {
                Storage::disk($media->disk)->delete($file_path);
            }
            $media->delete();
        }
        $slider->save();
        return redirect()->route('admin.sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider $slider
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Slider $slider)
    {
        DB::beginTransaction();
        $slider->delete();
        DB::commit();
        return redirect()->route('admin.sliders.index');
    }
}
