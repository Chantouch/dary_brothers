<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Vinkla\Instagram\Instagram;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {

        $products = (new Product())->newQuery()
            ->where('status', '=', 1)
            ->latest('updated_at')
            ->paginate(20);
        $sliders = (new Slider())->newQuery()->where('status', '=', 1)
            ->where('type', '=', 'slider')
            ->get();
        $banners = (new Slider())->newQuery()->where('status', '=', 1)
            ->where('type', '=', 'banner')
            ->get();
        $video = (new Slider())->newQuery()->where('status', '=', 1)
            ->where('type', '=', 'video')
            ->first();

        $instagrams = [];

        if (config('app.env') === 'production') {
            $instagram = new Instagram(config('services.instagram.access-token'));

            $instagrams = collect($instagram->get())->map(function ($each) {
                return $each->images->standard_resolution->url;
            });
        }

        return view('frontend.home', [
            'products' => $products,
            'sliders' => $sliders,
            'banners' => $banners,
            'video' => $video,
            'instagrams' => $instagrams
        ]);
    }

    /**
     * Show the list of products
     *
     * @param Request $request
     * @return View
     */
    public function getProductList(Request $request)
    {
        $products = (new Product())->newQuery()
            ->where('status', 1)
            ->latest('updated_at')
            ->paginate(20);

        return view('frontend.home', [
            'products' => $products
        ]);
    }
}
