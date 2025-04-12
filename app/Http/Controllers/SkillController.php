<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        return Skill::all(); // Retrieve all skills
    }

    public function show($id)
    {
        return Skill::findOrFail($id); // Retrieve a specific skill
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:skills,name',
        ]);

        $skill = Skill::create($data); // Create a new skill
        return response()->json($skill, 201);
    }

    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|unique:skills,name',
        ]);

        $skill->update($data); // Update skill
        return response()->json($skill);
    }

    public function destroy($id)
    {
        Skill::destroy($id); // Delete skill
        return response()->json(['message' => 'Skill deleted successfully']);
    }
}
