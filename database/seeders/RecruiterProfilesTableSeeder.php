<?php

namespace Database\Seeders;

use App\Models\RecruiterProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

class RecruiterProfilesTableSeeder extends Seeder
{
    public function run()
    {
        RecruiterProfile::create([
            'user_id' => User::where('email', 'jane@example.com')->first()->id,
            'company_name' => 'ABC Corp',
            'contact_number' => '987-654-3210',
            'industry' => 'Technology',
            'country' => 'USA',
        ]);
    }
}
