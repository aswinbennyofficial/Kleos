<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobPostController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'recruiter') abort(403);

        $jobs = JobPost::where('recruiter_id', Auth::id())->get();
        return view('recruiter.jobs.index', compact('jobs'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'recruiter') abort(403);

        // Pass categories and countries to the view
        $categories = ['Communication', 'Sales', 'Marketing', 'Problem Solving', 'Customer Service', 'Technical Support'];
        $countries = ['India', 'USA', 'UK', 'Canada', 'Germany', 'Australia', 'Brazil', 'France', 'Japan', 'Other'];
        return view('recruiter.jobs.create', compact('categories', 'countries'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'recruiter') abort(403);

        $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required',
            'category' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:100',
            'experience_level' => 'nullable|in:Intern,Entry,Mid,Senior',
            'salary' => 'nullable|numeric|min:0',
        ]);

        JobPost::create([
            'recruiter_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'country' => $request->country,
            'location' => $request->location,
            'experience_level' => $request->experience_level,
            'salary' => $request->salary,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job posted successfully.');
    }

    public function edit(JobPost $job)
    {
        if (Auth::user()->role !== 'recruiter' || $job->recruiter_id !== Auth::id()) abort(403);

        // Pass categories and countries to the view
        $categories = ['Communication', 'Sales', 'Marketing', 'Problem Solving', 'Customer Service', 'Technical Support'];
        $countries = ['India', 'USA', 'UK', 'Canada', 'Germany', 'Australia', 'Brazil', 'France', 'Japan', 'Other'];
        return view('recruiter.jobs.edit', compact('job', 'categories', 'countries'));
    }

    public function update(Request $request, JobPost $job)
    {
        if (Auth::user()->role !== 'recruiter' || $job->recruiter_id !== Auth::id()) abort(403);

        $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required',
            'category' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:100',
            'experience_level' => 'nullable|in:Intern,Entry,Mid,Senior',
            'salary' => 'nullable|numeric|min:0',
        ]);

        $job->update($request->only('title', 'description', 'category', 'country', 'location', 'experience_level', 'salary'));

        return redirect()->route('jobs.index')->with('success', 'Job updated.');
    }

    public function destroy(JobPost $job)
    {
        if (Auth::user()->role !== 'recruiter' || $job->recruiter_id !== Auth::id()) abort(403);

        $job->delete();
        return back()->with('success', 'Job deleted.');
    }
}
