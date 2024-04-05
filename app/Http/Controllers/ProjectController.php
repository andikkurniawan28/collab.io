<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setup = Setup::init();
        $data = Project::all();
        return view("project.index", compact("setup", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setup = Setup::init();
        return view("project.create", compact("setup"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Project::create($request->all());
        return redirect()->route("project.index")->with("success", ucwords(str_replace("_", " ", "project"))." has been stored.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $Project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $setup = Setup::init();
        $data = Project::whereId($id)->get()->last();
        return view("project.edit", compact("setup", "data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Project::whereId($id)->update($request->except([
            "_method", "_token"
        ]));
        return redirect()->route("project.index")->with("success", ucwords(str_replace("_", " ", "project"))." has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Project::whereId($id)->delete();
        return redirect()->route("project.index")->with("success", ucwords(str_replace("_", " ", "project"))." has been deleted.");
    }
}
