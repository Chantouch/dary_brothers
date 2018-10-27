<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    protected $view = 'admin.settings.';
    protected $route = 'admin.settings.';

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $settings = (new Setting())->newQuery();
        $name = $request->input('name');
        if ($request->has('name')) {
            $settings->where('name', 'LIKE', "%$name%");
        }
        $description = $request->input('description');
        if ($request->has('description')) {
            $settings->where('description', 'LIKE', "%$description%");
        }

        $settings = $settings->sortable()
            ->orderBy('name', 'ASC')
            ->get();
        Session::flash('_old_input', $request->all());
        return view('admin.settings.index', [
            'settings' => $settings
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
        $json = json_decode($setting->field);
        return view($this->view . 'edit', compact('setting', 'json'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);
        $update = $setting->update([
            'value' => $request->value
        ]);
        if (!$update) {
            return back()->with('error', 'Unsuccessed');
        }
        Artisan::call('cache:clear');
        // Artisan::call('config:cache');
        return redirect()->route($this->route . 'edit', [$setting->id])->with('success', 'Settings updated');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxUpdate(Request $request, $id)
    {
        $ajax = (new Setting())->newQuery()->find($id);
        $udpate = $ajax->update([
            'value' => $request->value
        ]);
        if (!$udpate) {
            return response()->json(['value' => $ajax->value]);
        }
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        return response()->json(['value' => $ajax->value]);
    }
}
