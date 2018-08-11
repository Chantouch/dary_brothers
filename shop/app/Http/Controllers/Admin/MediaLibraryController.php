<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\MediaLibrary\Models\Media;

class MediaLibraryController extends Controller
{
    /**
     * Return the media library.
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('admin.media.index', [
            'media' => Media::all()
        ]);
    }

    /**
     * Display the specified resource.
     * @param Media $medium
     * @return Media
     */
    public function show(Media $medium): Media
    {
        return $medium;
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     * @return View
     */
    public function create(Request $request): View
    {
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $image = $request->file('image');
        $name = $image->getClientOriginalName();
        if ($request->filled('name')) {
            $name = $request->input('name');
        }
        MediaLibrary::first()
            ->addMedia($image)
            ->usingName($name)
            ->toMediaCollection();
        return redirect()->route('admin.media.index')->withSuccess(__('media.created'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Media $medium
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Media $medium): RedirectResponse
    {
        $medium->delete();
        return redirect()->back()->withSuccess(__('media.deleted'));
    }
}
