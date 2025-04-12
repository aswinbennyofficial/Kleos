<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AgentProfileController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ApplicationController;

Route::get('/', function () {
    return view('welcome');
});

// Agent Profile Routes
Route::get('/agents', [AgentProfileController::class, 'index'])->name('agents.index');
Route::get('/agents/{id}', [AgentProfileController::class, 'show'])->name('agents.show');

// Job Post Routes
Route::get('/jobs', [JobPostController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [JobPostController::class, 'show'])->name('jobs.show');

// Application Routes
Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
