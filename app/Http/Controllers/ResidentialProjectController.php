<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidentialProject;

class ResidentialProjectController extends Controller
{
    public function index()
    {
        $projects = ResidentialProject::all();
        return view('admin.residential.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.residential.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'projectID' => 'required|unique:residential_projects',
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $project = new ResidentialProject();
        $project->projectID = $request->projectID;
        $project->title = $request->title;
        $project->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $project->image = $imagePath;
        }

        $project->save();

        return redirect()->route('residential_projects.create')->with('success', 'Project added successfully');
    }

    public function edit($id)
    {
        $project = ResidentialProject::findOrFail($id);
        return view('admin.residential.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'projectID' => 'required|unique:residential_projects,projectID,' . $id,
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $project = ResidentialProject::findOrFail($id);
        $project->projectID = $request->projectID;
        $project->title = $request->title;
        $project->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $project->image = $imagePath;
        }

        $project->save();

        return redirect()->route('residential_projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy($id)
    {
        $project = ResidentialProject::findOrFail($id);
        $project->delete();

        return redirect()->route('residential_projects.index')->with('success', 'Project deleted successfully');
    }
}
