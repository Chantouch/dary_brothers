<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        Media::first()
            ->addMedia($image)
            ->usingName($name)
            ->toMediaCollection();
        return redirect()->route('admin.media.index')->withSuccess(__('media.created'));
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $media = Media::find($id);
        if (empty($media)) {
            return response()->json(['message' => 'Sorry file does not exist.']);
        }

        $file_path = 'public/' . $id . '/' . $media->file_name;

        if (Storage::disk($media->disk)->exists($file_path)) {
            Storage::disk($media->disk)->delete($file_path);
        }

        $media->delete();

        return response()->json(['success' => 'Media deleted.']);
    }
}
