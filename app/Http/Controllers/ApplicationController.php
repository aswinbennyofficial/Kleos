<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'agent') {
            abort(403, 'Unauthorized access');
        }

        $query = JobPost::query();
        $categories = ['Communication', 'Sales', 'Marketing', 'Problem Solving', 'Customer Service', 'Technical Support'];
        $countries = ['India', 'USA', 'UK', 'Canada', 'Germany', 'Australia', 'Brazil', 'France', 'Japan', 'Other'];

        // Filters
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('country')) {
            $query->where('country', 'like', '%' . $request->country . '%');
        }

        if ($request->filled('experience_level')) {
            $query->where('experience_level', $request->experience_level);
        }

        // Applied filter
        $agentId = Auth::id();
        if ($request->filled('applied') && $request->applied == '1') {
            $appliedJobIds = Application::where('agent_id', $agentId)->pluck('job_id')->toArray();
            $query->whereIn('id', $appliedJobIds);
        }

        $jobs = $query->get();
        $appliedJobs = Application::where('agent_id', $agentId)->pluck('job_id')->toArray();

        return view('agents.jobs.index', compact('jobs', 'categories', 'countries', 'appliedJobs'));
    }

    public function apply(Request $request, JobPost $job)
    {
        if (!Auth::check() || Auth::user()->role !== 'agent') {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $agent = Auth::user();

        $existingApplication = Application::where('agent_id', $agent->id)
                                          ->where('job_id', $job->id)
                                          ->first();

        if ($existingApplication) {
            return back()->with('error', 'You have already applied for this job.');
        }

        Application::create([
            'agent_id' => $agent->id,
            'job_id' => $job->id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'You have successfully applied for this job.');
    }

    public function myApplications()
    {
        if (!Auth::check() || Auth::user()->role !== 'agent') {
            abort(403, 'Unauthorized');
        }

        $applications = Application::where('agent_id', Auth::id())->with('job')->get();
        return view('agents.jobs.applications', compact('applications'));
    }
}
