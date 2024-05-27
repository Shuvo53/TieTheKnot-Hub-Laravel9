<?php
// app/Http/Controllers/UserProjectController.php

// app/Http/Controllers/UserProjectController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project; // Assuming you have a Project model

class UserProjectController extends Controller
{
    public function index()
    {
        // Logic to fetch and display all projects, if applicable
        return view('frontend.projects.index');
    }

    // public function showResidential()
    // {
    //     // Fetch residential projects
    //     $projects = Project::where('type', 'residential')->get();
    //     return view('projects.residential', compact('projects'));
    // }

    // public function showCommercial()
    // {
    //     // Fetch commercial projects
    //     $projects = Project::where('type', 'commercial')->get();
    //     return view('projects.commercial', compact('projects'));
    // }
}
