<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AgentProfileController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\RecruiterProfileController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/recruiter/edit', [RecruiterProfileController::class, 'edit'])->name('recruiter.edit');
    Route::put('/recruiter/update', [RecruiterProfileController::class, 'update'])->name('recruiter.update');
});


Route::middleware('auth')->group(function () {
    Route::get('/agents', [AgentProfileController::class, 'index'])->name('agents.index');
    Route::get('/agents/edit', [AgentProfileController::class, 'edit'])->name('agents.edit');
    Route::post('/agents/edit', [AgentProfileController::class, 'update'])->name('agents.update');
});


// for recruiters
Route::get('/recruiter/jobs', [JobPostController::class, 'index'])->name('jobs.index');
Route::get('/recruiter/jobs/create', [JobPostController::class, 'create'])->name('jobs.create');
Route::post('/recruiter/jobs', [JobPostController::class, 'store'])->name('jobs.store');

Route::get('/recruiter/jobs/{job}/edit', [JobPostController::class, 'edit'])->name('jobs.edit');
Route::put('/recruiter/jobs/{job}', [JobPostController::class, 'update'])->name('jobs.update');
Route::delete('/recruiter/jobs/{job}', [JobPostController::class, 'destroy'])->name('jobs.destroy');



// for agents
// Route::get('jobs', [ApplicationController::class, 'index'])->name('agent.jobs.index');
// Route::post('/agent/jobs/{job}/apply', [ApplicationController::class, 'apply'])->name('agent.jobs.apply');
// Route::get('jobs/filter', [ApplicationController::class, 'filter'])->name('agent.jobs.filter');

Route::get('/agent/jobs', [ApplicationController::class, 'index'])->name('agent.jobs.index');
Route::post('/agent/jobs/{job}/apply', [ApplicationController::class, 'apply'])->name('agent.jobs.apply');
Route::get('/agent/applications', [ApplicationController::class, 'myApplications'])->name('agent.jobs.applications');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
