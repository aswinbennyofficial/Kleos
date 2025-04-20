<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecruiterDashboardController extends Controller
{
    //
    public function index()
    {
        return view('recruiter.dashboard');
    }

}
