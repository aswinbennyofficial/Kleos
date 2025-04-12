<?php

namespace Database\Seeders;

use App\Models\JobPost;
use App\Models\RecruiterProfile;
use Illuminate\Database\Seeder;

class JobPostsTableSeeder extends Seeder
{
    public function run()
    {
        JobPost::create([
            'recruiter_id' => RecruiterProfile::where('company_name', 'ABC Corp')->first()->id,
            'title' => 'Software Developer',
            'description' => 'We are looking for a PHP developer.',
            'category' => 'Sales',
            'location' => 'Remote',
        ]);
    }
}

