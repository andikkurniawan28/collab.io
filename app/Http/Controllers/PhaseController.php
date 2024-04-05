<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use Illuminate\Http\Request;
use App\Models\Phase;
use App\Http\Requests\PhaseStoreRequest;

class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setup = Setup::init();
        $data = Phase::all();
        return view("phase.index", compact("setup", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setup = Setup::init();
        return view("phase.create", compact("setup"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhaseStoreRequest $request)
    {
        Phase::create($request->all());
        return redirect()->route("phase.index")->with("success", ucwords(str_replace("_", " ", "phase"))." has been stored.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Phase $projectStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $setup = Setup::init();
        $data = Phase::whereId($id)->get()->last();
        return view("phase.edit", compact("setup", "data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhaseStoreRequest $request, $id)
    {
        Phase::whereId($id)->update($request->except([
            "_method", "_token"
        ]));
        return redirect()->route("phase.index")->with("success", ucwords(str_replace("_", " ", "phase"))." has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Phase::whereId($id)->delete();
        return redirect()->route("phase.index")->with("success", ucwords(str_replace("_", " ", "phase"))." has been deleted.");
    }
}
