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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recruiter_id')->constrained('users')->onDelete('cascade');

            $table->string('title', 150);
            $table->text('description');
            $table->string('category', 100)->nullable(); // Matches agent category
            $table->string('country', 100)->nullable();
            $table->string('location', 100)->nullable();
            $table->timestamps(0);
            $table->enum('experience_level', ['Intern','Entry', 'Mid', 'Senior'])->nullable();
            $table->decimal('salary', 10, 2)->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
