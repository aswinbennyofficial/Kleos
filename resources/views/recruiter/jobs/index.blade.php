@extends('layouts.app')
@section('content')

<div class="container">
    <div class="welcome-section mb-4">
        <h3>My Job Posts</h3>
        <p>Manage your job listings and find the perfect candidates</p>
        <a href="{{ route('jobs.create') }}" class="btn btn-light btn-lg">
            <i class="fas fa-plus-circle me-2"></i>Create New Job
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    @if(count($jobs) > 0)
        <div class="row">
            @foreach ($jobs as $job)
                <div class="col-md-6 mb-4">
                    <div class="card agent-card h-100">
                        <h5 class="card-title">{{ $job->title }}</h5>
                        
                        <div class="agent-meta">
                            <span class="meta-item">
                                <i class="fas fa-map-marker-alt"></i> {{ $job->location ?? 'Remote' }}
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-folder"></i> {{ $job->category ?? 'N/A' }}
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-graduation-cap"></i> {{ $job->experience_level }}
                            </span>
                        </div>
                        
                        <p class="card-text">{{ Str::limit($job->description, 150) }}</p>
                        
                        <div class="skills-tags">
                            <span class="skill-tag">{{ $job->country }}</span>
                            <span class="skill-tag">{{ $job->experience_level }}</span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>
                            
                            <form method="POST" action="{{ route('jobs.destroy', $job->id) }}" class="d-inline" 
                                  onsubmit="return confirm('Are you sure you want to delete this job post?');">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger btn-sm">
                                    <i class="fas fa-trash-alt me-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="card text-center py-5">
            <div class="card-body">
                <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                <h5 class="card-title">No Job Posts Yet</h5>
                <p class="card-text text-muted">You haven't created any job postings yet.</p>
                <a href="{{ route('jobs.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i>Create Your First Job Post
                </a>
            </div>
        </div>
    @endif
</div>

@endsection