@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Welcome Section -->
    <div class="welcome-section">
        <h3><i class="fas fa-clipboard-list"></i> Job Applications</h3>
        <p>Review and manage all agent applications for your job postings.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
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

            <!-- Applications Card -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-users"></i> All Applications</h5>
                    <span class="badge bg-primary">{{ count($applications) }} Total</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th><i class="fas fa-briefcase me-1"></i> Job Title</th>
                                    <th><i class="fas fa-user me-1"></i> Agent Name</th>
                                    <th><i class="fas fa-phone me-1"></i> Phone</th>
                                    <th><i class="fas fa-history me-1"></i> YOE</th>
                                    <th><i class="fas fa-tag me-1"></i> Tagline</th>
                                    <th><i class="fas fa-file-alt me-1"></i> Resume</th>
                                    <th><i class="fas fa-info-circle me-1"></i> Status</th>
                                    <th><i class="fas fa-cog me-1"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applications as $application)
                                @php
                                $agent = $application->agent;
                                $profile = $agent->agentProfile;
                                @endphp
                                <tr>
                                    <td class="fw-bold">{{ $application->job->title }}</td>
                                    <td>{{ $agent?->name ?? 'NA' }}</td>
                                    <td>{{ $profile?->phone ?? 'NA' }}</td>
                                    <td>{{ $profile?->yoe ?? '0' }} yrs</td>
                                    <td class="text-truncate" style="max-width: 150px">{{ $profile?->tagline ?? '-' }}</td>
                                    <td>
                                        @if ($profile?->resume_url)
                                        <a href="{{ $profile->resume_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-external-link-alt"></i> View
                                        </a>
                                        @else
                                        <span class="badge bg-secondary">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($application->status === 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($application->status === 'accepted')
                                            <span class="badge bg-success">Accepted</span>
                                        @elseif($application->status === 'rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('recruiter.update-status', $application->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="accepted" {{ $application->status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    @if(count($applications) == 0)
                    <div class="text-center py-4">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No applications have been submitted yet.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection