<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('skills')->insert([
            ['name' => 'Communication'],
            ['name' => 'Sales'],
            ['name' => 'Marketing'],
            ['name' => 'Problem Solving'],
            ['name' => 'Customer Service'],
            ['name' => 'Technical Support'],
        ]);
    }

    public function down(): void
    {
        DB::table('skills')->whereIn('name', [
            'Communication', 'Sales', 'Marketing',
            'Problem Solving', 'Customer Service', 'Technical Support',
        ])->delete();
    }
};
