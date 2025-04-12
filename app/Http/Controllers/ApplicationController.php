<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        return Application::with(['agent', 'job'])->get(); // Retrieve all applications with related data
    }

    public function show($id)
    {
        return Application::with(['agent', 'job'])->findOrFail($id); // Retrieve a specific application
    }

    public function store(Request $request)
    {
        Application::create($request->all());
        return redirect()->route('jobs.index');
    }

    public function update(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $data = $request->validate([
            'status' => 'nullable|string|in:pending,accepted,rejected',
        ]);

        $application->update($data); // Update the application status
        return response()->json($application);
    }

    public function destroy($id)
    {
        Application::destroy($id); // Delete application
        return response()->json(['message' => 'Application deleted successfully']);
    }
}
