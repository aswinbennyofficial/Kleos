<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AgentProfileController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ApplicationController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/agents', [AgentProfileController::class, 'index'])->name('agents.index');
    Route::get('/agents/edit', [AgentProfileController::class, 'edit'])->name('agents.edit');
    Route::post('/agents/edit', [AgentProfileController::class, 'update'])->name('agents.update');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
