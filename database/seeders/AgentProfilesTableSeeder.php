<?php

namespace Database\Seeders;

use App\Models\AgentProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

class AgentProfilesTableSeeder extends Seeder
{
    public function run()
    {
        AgentProfile::create([
            'user_id' => User::where('email', 'john@example.com')->first()->id,
            'phone' => '123-456-7890',
            'yoe' => 5,
            'category' => 'Sales',
            'country' => 'USA',
            'resume_url' => 'http://example.com/resume.pdf',
            'is_available' => true,
        ]);
    }
}
