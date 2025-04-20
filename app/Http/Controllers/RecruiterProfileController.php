<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RecruiterProfile;

class RecruiterProfileController extends Controller
{
    public function edit()
    {
        // If the recruiter profile doesn't exist, create a new instance
        $recruiterProfile = Auth::user()->recruiterProfile ?? new RecruiterProfile();
        return view('recruiter.edit', compact('recruiterProfile'));
    }

    public function update(Request $request)
    {
        // Validate the incoming request based on the actual schema
        $request->validate([
            'company_name' => 'required|string|max:100',
            'contact_number' => 'nullable|string|max:20',
            'industry' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
        ]);

        // Get or create the recruiter profile
        $profile = Auth::user()->recruiterProfile ?? new RecruiterProfile();

        // Update or create the profile fields
        $profile->user_id = Auth::id(); // Make sure the profile belongs to the current user
        $profile->company_name = $request->input('company_name');
        $profile->contact_number = $request->input('contact_number');
        $profile->industry = $request->input('industry');
        $profile->country = $request->input('country');
        
        // Save the profile (this will either update an existing one or create a new one)
        $profile->save();

        // Redirect back with success message - changed to match the agents pattern
        return redirect()->route('recruiter.edit')->with('success', 'Recruiter profile updated successfully!');
    }
}