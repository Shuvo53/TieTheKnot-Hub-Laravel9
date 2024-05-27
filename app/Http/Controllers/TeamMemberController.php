<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::all();
        return view('admin.team.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|unique:team_members',
            'name' => 'required',
            'post' => 'required',
            'image' => 'nullable|image',
        ]);

        $teamMember = new TeamMember();
        $teamMember->employee_id = $request->employee_id;
        $teamMember->name = $request->name;
        $teamMember->post = $request->post;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $teamMember->image = $imagePath;
        }

        $teamMember->save();

        return redirect()->route('team_members.create')->with('success', 'Team member added successfully');
    }

    public function edit($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        return view('admin.team.edit', compact('teamMember'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|unique:team_members,employee_id,' . $id,
            'name' => 'required',
            'post' => 'required',
            'image' => 'nullable|image',
        ]);

        $teamMember = TeamMember::findOrFail($id);
        $teamMember->employee_id = $request->employee_id;
        $teamMember->name = $request->name;
        $teamMember->post = $request->post;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $teamMember->image = $imagePath;
        }

        $teamMember->save();

        return redirect()->route('team_members.index')->with('success', 'Team member updated successfully');
    }

    public function destroy($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        $teamMember->delete();

        return redirect()->route('team_members.index')->with('success', 'Team member deleted successfully');
    }
}
