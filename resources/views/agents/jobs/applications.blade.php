@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Your Applied Jobs</h3>

    @if ($applications->count())
        @foreach ($applications as $application)
            <div class="card mb-3">
                <div class="card-body">
                    <h4>{{ $application->job->title }}</h4>
                    <p>{{ $application->job->description }}</p>
                    <p><strong>Category:</strong> {{ $application->job->category }}</p>
                    <p><strong>Country:</strong> {{ $application->job->country }}</p>
                    <p><strong>Experience:</strong> {{ $application->job->experience_level }}</p>
                    <p><strong>Salary:</strong> {{ $application->job->salary ?? 'Not specified' }}</p>
                    <p><strong>Status:</strong> <span class="badge bg-info text-dark">{{ ucfirst($application->status) }}</span></p>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-warning">You haven't applied to any jobs yet.</div>
    @endif

    <div class="mt-3">
        <a href="{{ route('agent.jobs.index') }}" class="btn btn-secondary">Back to All Jobs</a>
    </div>
</div>
@endsection
