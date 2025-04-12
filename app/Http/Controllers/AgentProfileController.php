<?php

namespace App\Http\Controllers;

use App\Models\AgentProfile;
use Illuminate\Http\Request;

class AgentProfileController extends Controller
{
    public function index()
    {
        $agents = AgentProfile::all();
        return view('agents.index', compact('agents'));
    }

    public function show($id)
    {
        $agent = AgentProfile::findOrFail($id);
        return view('agents.show', compact('agent'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required',
            'yoe' => 'required|integer',
            'category' => 'required|string',
            'country' => 'required|string',
            'resume_url' => 'nullable|url',
        ]);

        $agentProfile = AgentProfile::create($data); // Create a new agent profile
        return response()->json($agentProfile, 201);
    }

    public function update(Request $request, $id)
    {
        $agentProfile = AgentProfile::findOrFail($id);
        $data = $request->validate([
            'phone' => 'required',
            'yoe' => 'required|integer',
            'category' => 'required|string',
            'country' => 'required|string',
            'resume_url' => 'nullable|url',
        ]);

        $agentProfile->update($data); // Update the agent profile
        return response()->json($agentProfile);
    }

    public function destroy($id)
    {
        AgentProfile::destroy($id); // Delete the agent profile
        return response()->json(['message' => 'Profile deleted successfully']);
    }
}
