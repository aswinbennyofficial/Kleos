@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Welcome Section -->
    <div class="welcome-section">
        <h3><i class="fas fa-briefcase"></i> Your Applied Jobs</h3>
        <p>Track the status of all your job applications in one place.</p>
    </div>

    @if ($applications->count())
        <div class="row">
            @foreach ($applications as $application)
                <div class="col-md-6 mb-4">
                    <div class="card agent-card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h4 class="card-title">{{ $application->job->title }}</h4>
                                @if($application->status === 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($application->status === 'accepted')
                                    <span class="badge bg-success">Accepted</span>
                                @elseif($application->status === 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                            </div>
                            
                            <p class="mb-3">{{ \Illuminate\Support\Str::limit($application->job->description, 150) }}</p>
                            
                            <div class="agent-meta mb-3">
                                <div class="meta-item">
                                    <i class="fas fa-tag"></i>
                                    {{ $application->job->category }}
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-globe-americas"></i>
                                    {{ $application->job->country }}
                                </div>
                            </div>
                            
                            <div class="agent-meta">
                                <div class="meta-item">
                                    <i class="fas fa-user-clock"></i>
                                    Experience: {{ $application->job->experience_level }}
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-money-bill-wave"></i>
                                    Salary: {{ $application->job->salary ?? 'Not specified' }}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-top-0 d-flex justify-content-end">
                            <button class="btn btn-link btn-sm" data-bs-toggle="modal" data-bs-target="#jobModal{{ $application->id }}">
                                <i class="fas fa-eye"></i> View Details
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Modal for job details -->
                <div class="modal fade" id="jobModal{{ $application->id }}" tabindex="-1" aria-labelledby="jobModalLabel{{ $application->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="padding:20px">
                            <div class="modal-header">
                                <h5 class="modal-title" id="jobModalLabel{{ $application->id }}">{{ $application->job->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-4">
                                    <h6 class="fw-bold text-primary"><i class="fas fa-file-alt me-2"></i>Description</h6>
                                    <p>{{ $application->job->description }}</p>
                                </div>
                                
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <h6 class="fw-bold text-primary"><i class="fas fa-info-circle me-2"></i>Job Details</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><i class="fas fa-tag me-2 text-muted"></i> <strong>Category:</strong> {{ $application->job->category }}</li>
                                            <li class="mb-2"><i class="fas fa-globe-americas me-2 text-muted"></i> <strong>Location:</strong> {{ $application->job->country }}</li>
                                            <li class="mb-2"><i class="fas fa-user-clock me-2 text-muted"></i> <strong>Experience Level:</strong> {{ $application->job->experience_level }}</li>
                                            <li class="mb-2"><i class="fas fa-money-bill-wave me-2 text-muted"></i> <strong>Salary:</strong> {{ $application->job->salary ?? 'Not specified' }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="fw-bold text-primary"><i class="fas fa-clipboard-check me-2"></i>Application Status</h6>
                                        <div class="p-3 rounded" style="background-color: rgba(0,0,0,0.05);">
                                            <div class="d-flex align-items-center">
                                                @if($application->status === 'pending')
                                                    <div class=" me-2" style="width: 40px; height: 40px; border-radius: 50%; background-color: var(--warning); display: flex; align-items: center; justify-content: center;">
                                                        <i class="fas fa-hourglass-half text-white"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Pending Review</h6>
                                                        <small class="text-muted">Your application is being reviewed</small>
                                                    </div>
                                                @elseif($application->status === 'accepted')
                                                    <div class=" me-2" style="width: 40px; height: 40px; border-radius: 50%; background-color: var(--success); display: flex; align-items: center; justify-content: center;">
                                                        <i class="fas fa-check text-white"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Accepted</h6>
                                                        <small class="text-muted">Congratulations! Your application has been accepted</small>
                                                    </div>
                                                @elseif($application->status === 'rejected')
                                                    <div class="d-inline-block me-2" style="width: 40px; height: 40px; border-radius: 50%; background-color: var(--danger); display: flex; align-items: center; justify-content: center;">
                                                        <i class="fas fa-times text-white"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Not Selected</h6>
                                                        <small class="text-muted">Your application was not selected for this position</small>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                <h5>No Applications Yet</h5>
                <p class="text-muted">You haven't applied to any jobs yet. Browse available positions to get started.</p>
                <a href="{{ route('agent.jobs.index') }}" class="btn btn-primary mt-2">
                    <i class="fas fa-search me-2"></i>Browse Available Jobs
                </a>
            </div>
        </div>
    @endif

    <div class="mt-4 mb-5">
        <a href="{{ route('agent.jobs.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left me-2"></i>Back to All Jobs
        </a>
    </div>
</div>
@endsection