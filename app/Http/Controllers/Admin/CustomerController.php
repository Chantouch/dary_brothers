<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Customer\StoreRequest;
use App\Http\Requests\Admin\Customer\UpdateRequest;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.customers.index', [
            'customers' => (new Customer())->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.customers.create');
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
        $customer = new Customer($request->all());
        $customer->save();
        DB::commit();
        return redirect()->route('admin.customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @return View
     */
    public function show(Customer $customer): View
    {
        return view('admin.customers.show', [
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @return View
     */
    public function edit(Customer $customer): View
    {
        return view('admin.customers.edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param Customer $customer
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(UpdateRequest $request, Customer $customer)
    {
        DB::beginTransaction();
        $customer->fill($request->all());
        $customer->save();
        DB::commit();
        return redirect()->route('admin.customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Customer $customer)
    {
        DB::beginTransaction();
        $customer->delete();
        DB::commit();
        return redirect()->back();
    }
}
