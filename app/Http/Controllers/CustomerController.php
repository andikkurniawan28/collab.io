<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerStoreRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setup = Setup::init();
        $data = Customer::all();
        return view("customer.index", compact("setup", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setup = Setup::init();
        return view("customer.create", compact("setup"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        Customer::create($request->all());
        return redirect()->route("customer.index")->with("success", ucwords(str_replace("_", " ", "customer"))." has been stored.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $Customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $setup = Setup::init();
        $data = Customer::whereId($id)->get()->last();
        return view("customer.edit", compact("setup", "data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerStoreRequest $request, $id)
    {
        Customer::whereId($id)->update($request->except([
            "_method", "_token"
        ]));
        return redirect()->route("customer.index")->with("success", ucwords(str_replace("_", " ", "customer"))." has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Customer::whereId($id)->delete();
        return redirect()->route("customer.index")->with("success", ucwords(str_replace("_", " ", "customer"))." has been deleted.");
    }
}
