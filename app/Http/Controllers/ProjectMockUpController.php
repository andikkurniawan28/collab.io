<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use App\Models\Mockup;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectMockUpController extends Controller
{
    public function index($project_id){
        $setup = Setup::init();
        $data = Project::whereId($project_id)->get()->last();
        return view("project.mockup", compact("setup", "data"));
    }

    public function upload(Request $request){
        $image = $request->file('file');
        $imageName = time().rand(1,99).'.'.$image->extension();
        $image->move(public_path('mockup'), $imageName);
        Mockup::insert(["project_id" => $request->project_id, "path" => "mockup/{$imageName}"]);
        return response()->json(['success'=>$imageName]);
    }

    public function delete(Request $request, $id){
        Mockup::whereId($id)->delete();
        File::delete(public_path($request->path));
        return redirect()->back();
    }
}
