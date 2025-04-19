<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('agent_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('phone', 20)->nullable();
            $table->integer('yoe')->default(0); // Years of experience
            $table->string('category', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->text('resume_url')->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });

        // Migration for the agent_skill pivot table
        Schema::create('agent_skill', function (Blueprint $table) {
            $table->foreignId('agent_id')->constrained('agent_profiles')->onDelete('cascade');
            $table->foreignId('skill_id')->constrained('skills')->onDelete('cascade');
            $table->primary(['agent_id', 'skill_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_skill');
        Schema::dropIfExists('agent_profiles');
    }
};
