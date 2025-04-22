@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Status message -->
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle me-2"></i>
                    <strong>Success!</strong> {{ session('status') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
            <!-- Welcome banner -->
            <div class="welcome-section">
                <h3>Welcome back, {{ auth()->user()->name }}! 👋</h3>
                <p>{{ __('Your talent marketplace dashboard is ready. Manage your profile and connect with opportunities.') }}</p>
            </div>
            
            <!-- Action cards -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="dashboard-action success h-100">
                        <i class="fas fa-user-edit"></i>
                        <h4>Edit Your Profile</h4>
                        <p>Update your experience, skills, and availability to attract the right opportunities.</p>
                        <a href="{{ route('agents.edit') }}" class="btn btn-primary mt-3 align-items-center">
                            Manage Profile
                        </a>
                    </div>
                </div>
                
                {{-- <div class="col-md-6 mb-4">
                    <div class="dashboard-action success h-100">
                        <i class="fas fa-users"></i>
                        <h4>Browse Agents</h4>
                        <p>Discover talent, connect with peers, and build your professional network.</p>
                        <a href="{{ route('agents.index') }}" class="btn btn-primary mt-3 align-items-center">
                             Find Talent
                        </a>
                    </div>
                </div> --}}

                <!-- Add the job applications section -->
                <div class="col-md-6 mb-4">
                    <div class="dashboard-action success h-100">
                        <i class="fas fa-briefcase"></i>
                        <h4>Job Opening</h4>
                        <p>Check the job applications you have submitted and their current status.</p>
                        <a href="{{ route('agent.jobs.index') }}" class="btn btn-primary mt-3 align-items-center">
                             View Applications
                        </a>
                    </div>
                </div>
            
            
                <div class="col-md-6 mb-4">
                    <div class="dashboard-action success h-100">
                        <i class="fas fa-tasks"></i>
                        <h4>Check Application Status</h4>
                        <p>Track the progress of the jobs you’ve applied to and stay updated.</p>
                        <a href="{{ route('agent.jobs.applications') }}" class="btn btn-primary mt-3 align-items-center">
                            Job Status
                        </a>
                    </div>
                </div>
            </div>

            <!-- Status card -->
            {{-- <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Account Status</h5>
                    <span class="badge bg-primary">{{ auth()->user()->role }}</span>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="with-icon">
                            <i class="fas fa-id-badge text-primary me-2"></i>
                            <div>
                                <h6 class="mb-1">Profile Completeness</h6>
                                <div class="progress" style="height: 8px; width: 200px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="with-icon">
                            <i class="fas fa-eye text-primary me-2"></i>
                            <div>
                                <h6 class="mb-1">Profile Visibility</h6>
                                <span class="badge bg-success">Public</span>
                            </div>
                        </div>
                        <a href="{{ route('logout') }}" class="btn btn-outline-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
