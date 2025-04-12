<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    public function run()
    {
        Skill::create(['name' => 'PHP']);
        Skill::create(['name' => 'JavaScript']);
        Skill::create(['name' => 'SQL']);
    }
}
