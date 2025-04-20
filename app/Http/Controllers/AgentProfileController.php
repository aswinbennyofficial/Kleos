<?php

namespace App\Http\Controllers;

use App\Models\AgentProfile;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentProfileController extends Controller
{
    public function index(Request $request)
    {
        $skill = $request->query('skill');
        $country = $request->query('country');
        $available = $request->query('available');
        $yoe = $request->query('yoe');

        $agents = AgentProfile::with(['skills', 'user'])
            ->whereHas('user', fn($q) => $q->where('role', 'agent'))
            ->when($skill, fn($q) => $q->whereHas('skills', fn($q) => $q->where('name', $skill)))
            ->when($country, fn($q) => $q->where('country', 'like', "%$country%"))
            ->when($available !== null, fn($q) => $q->where('is_available', $available))
            ->when($yoe, fn($q) => $q->where('yoe', '>=', $yoe))
            ->latest()
            ->get();

        $skills = Skill::all();

        return view('agents.index', compact('agents', 'skills'));
    }

    public function edit()
    {
        $agent = auth()->user()->agentProfile;

        if (!$agent) {
            $agent = \App\Models\AgentProfile::create([
                'user_id' => auth()->id(),
                'is_available' => true,
            ]);
        }

        $agent->load('skills');
        $skills = \App\Models\Skill::all();

        return view('agents.edit', compact('agent', 'skills'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string|max:20',
            'yoe' => 'nullable|integer|min:0',
            'tagline' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'resume_url' => 'nullable|url',
            'is_available' => 'required|boolean',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ]);

        $agent = AgentProfile::firstOrCreate(
            ['user_id' => auth()->id()]
        );

        $agent->update($request->only(['phone', 'yoe', 'tagline', 'country', 'resume_url', 'is_available']));


        $agent->skills()->sync($request->input('skills', []));

        return redirect()->route('agents.edit')->with('success', 'Profile updated successfully!');
    }
}
