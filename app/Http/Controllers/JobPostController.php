<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    public function index()
    {
        $jobs = JobPost::all();
        return view('jobs.index', compact('jobs'));
    }

    public function show($id)
    {
        $job = JobPost::findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'recruiter_id' => 'required|exists:recruiter_profiles,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'category' => 'nullable|string',
            'location' => 'nullable|string',
        ]);

        $jobPost = JobPost::create($data); // Create a new job post
        return response()->json($jobPost, 201);
    }

    public function update(Request $request, $id)
    {
        $jobPost = JobPost::findOrFail($id);
        $data = $request->validate([
            'recruiter_id' => 'required|exists:recruiter_profiles,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'category' => 'nullable|string',
            'location' => 'nullable|string',
        ]);

        $jobPost->update($data); // Update the job post
        return response()->json($jobPost);
    }

    public function destroy($id)
    {
        JobPost::destroy($id); // Delete job post
        return response()->json(['message' => 'Job post deleted successfully']);
    }
}
