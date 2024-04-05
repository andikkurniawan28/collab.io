<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectMockUpController extends Controller
{
    public function index($project_id){
        $setup = Setup::init();
        $data = Project::whereId($project_id)->get()->last();
        return view("project.mockup", compact("setup", "data"));
    }
}
