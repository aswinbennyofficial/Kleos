@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Welcome Section -->
    <div class="welcome-section">
        <h3><i class="fas fa-briefcase"></i> Available Job Posts</h3>
        <p>Discover and apply to jobs that match your skills and experience.</p>
    </div>

    <!-- Filter section -->
    <div class="filter-section mb-4">
        <form method="GET" action="{{ route('agent.jobs.index') }}">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Country</label>
                    <select name="country" class="form-select">
                        <option value="">All Countries</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Experience</label>
                    <select name="experience_level" class="form-select">
                        <option value="">All Levels</option>
                        @foreach(['Intern', 'Entry', 'Mid', 'Senior'] as $level)
                            <option value="{{ $level }}" {{ request('experience_level') == $level ? 'selected' : '' }}>{{ $level }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Application</label>
                    <select name="applied" class="form-select">
                        <option value="">Show All</option>
                        <option value="1" {{ request('applied') == '1' ? 'selected' : '' }}>Only Applied</option>
                        <option value="0" {{ request('applied') == '0' ? 'selected' : '' }}>Hide Applied</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <div class="d-flex gap-2 w-100">
                        <button type="submit" class="btn btn-primary flex-grow-1">
                            <i class="fas fa-filter me-1"></i> Filter
                        </button>
                        <a href="{{ route('agent.jobs.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-redo-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Jobs list -->
    <div class="row">
        @forelse ($jobs as $job)
            <div class="col-md-6 mb-4">
                <div class="card h-100 agent-card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $job->title }}</h4>
                        
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="badge bg-primary">{{ $job->category }}</span>
                            <span class="badge bg-secondary">{{ $job->experience_level }}</span>
                            <span class="badge bg-info text-dark">{{ $job->country }}</span>
                        </div>
                        
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($job->description, 150) }}</p>
                        
                        <div class="agent-meta">
                            <div class="meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $job->location ?? $job->country }}
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-money-bill-wave"></i>
                                {{ $job->salary ?? 'Salary not specified' }}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                        <button class="btn btn-sm btn-link p-0" data-bs-toggle="modal" data-bs-target="#jobModal{{ $job->id }}">
                            <i class="fas fa-info-circle"></i> View Details
                        </button>
                        
                        @if (in_array($job->id, $appliedJobIds))
                            <span class="badge bg-success"><i class="fas fa-check me-1"></i> Applied</span>
                        @else
                            <form method="POST" action="{{ route('agent.jobs.apply', $job->id) }}">
                                @csrf
                                <input type="hidden" name="status" value="pending">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-paper-plane me-1"></i> Apply Now
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Modal for job details -->
            <div class="modal fade" id="jobModal{{ $job->id }}" tabindex="-1" aria-labelledby="jobModalLabel{{ $job->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="jobModalLabel{{ $job->id }}">{{ $job->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-4">
                                <h6 class="fw-bold text-primary"><i class="fas fa-file-alt me-2"></i>Job Description</h6>
                                {{-- <p>{{ $job->description }}</p> --}}
                                <p>{!! nl2br(e($job->description)) !!}</p>

                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h6 class="fw-bold text-primary"><i class="fas fa-info-circle me-2"></i>Job Details</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="fas fa-tag me-2 text-muted"></i> <strong>Category:</strong> {{ $job->category }}</li>
                                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2 text-muted"></i> <strong>Location:</strong> {{ $job->location }}</li>
                                        <li class="mb-2"><i class="fas fa-globe-americas me-2 text-muted"></i> <strong>Country:</strong> {{ $job->country }}</li>
                                        <li class="mb-2"><i class="fas fa-user-clock me-2 text-muted"></i> <strong>Experience Level:</strong> {{ $job->experience_level }}</li>
                                        <li class="mb-2"><i class="fas fa-money-bill-wave me-2 text-muted"></i> <strong>Salary:</strong> {{ $job->salary ?? 'Not specified' }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            @if (in_array($job->id, $appliedJobIds))
                                <button class="btn btn-success" disabled>
                                    <i class="fas fa-check me-1"></i> Already Applied
                                </button>
                            @else
                                <form method="POST" action="{{ route('agent.jobs.apply', $job->id) }}">
                                    @csrf
                                    <input type="hidden" name="status" value="pending">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-paper-plane me-1"></i> Apply for This Job
                                    </button>
                                </form>
                            @endif
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h5>No Jobs Found</h5>
                        <p class="text-muted">No jobs matching your criteria were found. Try adjusting your filters.</p>
                        <a href="{{ route('agent.jobs.index') }}" class="btn btn-primary mt-2">
                            <i class="fas fa-redo-alt me-1"></i> Reset Filters
                        </a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-4 mb-5 text-center">
        <a href="{{ route('agent.jobs.applications') }}" class="btn btn-outline-primary">
            <i class="fas fa-clipboard-list me-1"></i> View My Applied Jobs
        </a>
    </div>
</div>
@endsection