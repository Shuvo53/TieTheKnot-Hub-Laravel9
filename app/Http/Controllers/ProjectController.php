<?php

// app/Http/Controllers/ProjectController.php

namespace App\Http\Controllers;

use App\Models\ResidentialProject;
use App\Models\CommercialProject;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $residentialProjects = ResidentialProject::all();
        $commercialProjects = CommercialProject::all();
        return view('admin.project.index', compact('residentialProjects', 'commercialProjects'));
    }
}
