<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\AgentProfile;
use App\Models\JobPost;
use Illuminate\Database\Seeder;

class ApplicationsTableSeeder extends Seeder
{
    public function run()
    {
        Application::create([
            'agent_id' => AgentProfile::where('phone', '123-456-7890')->first()->id,
            'job_id' => JobPost::where('title', 'Software Developer')->first()->id,
            'status' => 'pending',
        ]);
    }
}