<?php

namespace App\Http\Controllers;

use App\Models\RecruiterProfile;
use Illuminate\Http\Request;

class RecruiterProfileController extends Controller
{
    public function index()
    {
        return RecruiterProfile::all(); // Retrieve all recruiter profiles
    }

    public function show($id)
    {
        return RecruiterProfile::findOrFail($id); // Retrieve a specific recruiter profile
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string',
            'contact_number' => 'nullable|string',
            'industry' => 'nullable|string',
            'country' => 'nullable|string',
        ]);

        $recruiterProfile = RecruiterProfile::create($data); // Create new recruiter profile
        return response()->json($recruiterProfile, 201);
    }

    public function update(Request $request, $id)
    {
        $recruiterProfile = RecruiterProfile::findOrFail($id);
        $data = $request->validate([
            'company_name' => 'required|string',
            'contact_number' => 'nullable|string',
            'industry' => 'nullable|string',
            'country' => 'nullable|string',
        ]);

        $recruiterProfile->update($data); // Update recruiter profile
        return response()->json($recruiterProfile);
    }

    public function destroy($id)
    {
        RecruiterProfile::destroy($id); // Delete recruiter profile
        return response()->json(['message' => 'Profile deleted successfully']);
    }
}
