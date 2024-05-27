<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommercialProject;

class CommercialProjectController extends Controller
{
    public function index()
    {
        $projects = CommercialProject::all();
        return view('admin.commercial.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.commercial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'projectID' => 'required|unique:commercial_projects',
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $project = new CommercialProject();
        $project->projectID = $request->projectID;
        $project->title = $request->title;
        $project->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $project->image = $imagePath;
        }

        $project->save();

        return redirect()->route('commercial_projects.create')->with('success', 'Project added successfully');
    }

    public function edit($id)
    {
        $project = CommercialProject::findOrFail($id);
        return view('admin.commercial.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'projectID' => 'required|unique:commercial_projects,projectID,' . $id,
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $project = CommercialProject::findOrFail($id);
        $project->projectID = $request->projectID;
        $project->title = $request->title;
        $project->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $project->image = $imagePath;
        }

        $project->save();

        return redirect()->route('commercial_projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy($id)
    {
        $project = CommercialProject::findOrFail($id);
        $project->delete();

        return redirect()->route('commercial_projects.index')->with('success', 'Project deleted successfully');
    }
}
