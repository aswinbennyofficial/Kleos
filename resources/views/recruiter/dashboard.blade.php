@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Welcome, {{ auth()->user()->name }}! 👋</h3>
    <p>You’re logged in as a recruiter. Manage your profile or browse agent profiles.</p>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="dashboard-action primary h-100">
                <i class="fas fa-user-edit"></i>
                <h4>Edit Your Recruiter Profile</h4>
                <a href="{{ route('recruiter.edit') }}" class="btn btn-primary mt-3">Edit Profile</a>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="dashboard-action success h-100">
                <i class="fas fa-users"></i>
                <h4>Find Agents</h4>
                <a href="{{ route('agents.index') }}" class="btn btn-success mt-3">Browse Talent</a>
            </div>
        </div>
    </div>
</div>
@endsection
