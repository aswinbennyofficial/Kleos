<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function __construct()
    {
        // Ensure only agents can access the controller actions
        if (Auth::check() && Auth::user()->role !== 'agent') {
            abort(403); // Forbidden if the user is not an agent
        }
    }

    public function index()
    {
        // Retrieve all jobs for agents to apply to
        $jobs = JobPost::all(); // You can add more filters based on the agent's profile or preferences.
        $categories = ['Communication', 'Sales', 'Marketing', 'Problem Solving', 'Customer Service', 'Technical Support'];
        $countries = ['India', 'USA', 'UK', 'Canada', 'Germany', 'Australia', 'Brazil', 'France', 'Japan', 'Other'];

        return view('agents.jobs.index', compact('jobs', 'categories', 'countries'));
    }

    public function apply(Request $request, JobPost $job)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,rejected',  // Only status pending or accepted/rejected can be applied
        ]);

        // Ensure agent is logged in and is not the recruiter
        $agent = Auth::user();

        // Check if the agent has already applied to the job
        $existingApplication = Application::where('agent_id', $agent->id)
                                          ->where('job_id', $job->id)
                                          ->first();

        if ($existingApplication) {
            return back()->with('error', 'You have already applied for this job.');
        }

        // Create a new application record
        Application::create([
            'agent_id' => $agent->id,
            'job_id' => $job->id,
            'status' => 'pending',  // Default status is 'pending'
        ]);

        return back()->with('success', 'You have successfully applied for this job.');
    }

    public function filter(Request $request)
    {
        $query = JobPost::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('country')) {
            $query->where('country', 'like', '%' . $request->country . '%');
        }

        if ($request->filled('experience_level')) {
            $query->where('experience_level', $request->experience_level);
        }

        $jobs = $query->get();

        $categories = ['Communication', 'Sales', 'Marketing', 'Problem Solving', 'Customer Service', 'Technical Support'];
        $countries = ['India', 'USA', 'UK', 'Canada', 'Germany', 'Australia', 'Brazil', 'France', 'Japan', 'Other'];

        return view('agents.jobs.index', compact('jobs', 'categories', 'countries'));
    }
}
