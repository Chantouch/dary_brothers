<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.users.index', [
            'users' => (new User())->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.users.create');
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
        $user = new User($request->all());
        $user->save();
        DB::commit();
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function show(User $user): View
    {
        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(UpdateRequest $request, User $user)
    {
        DB::beginTransaction();
        $user->fill($request->all());
        $user->save();
        DB::commit();
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        $user->delete();
        DB::commit();
        return redirect()->back();
    }
}
