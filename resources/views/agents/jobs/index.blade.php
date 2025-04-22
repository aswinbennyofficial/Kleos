@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Available Job Posts</h3>

    <!-- Filter form -->
    <form method="GET" action="{{ route('agent.jobs.index') }}">
        <div class="row g-3">
            <div class="col-md-3">
                <select name="category" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <select name="country" class="form-control">
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <select name="experience_level" class="form-control">
                    <option value="">Experience</option>
                    @foreach(['Intern', 'Entry', 'Mid', 'Senior'] as $level)
                        <option value="{{ $level }}" {{ request('experience_level') == $level ? 'selected' : '' }}>{{ $level }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <select name="applied" class="form-control">
                    <option value="">Show All</option>
                    <option value="1" {{ request('applied') == '1' ? 'selected' : '' }}>Only Applied</option>
                    <option value="0" {{ request('applied') == '0' ? 'selected' : '' }}>Hide Applied</option>
                </select>
            </div>

            <div class="col-md-1">
                <button class="btn btn-primary w-100">Filter</button>
            </div>

            <div class="col-md-1">
                <a href="{{ route('agent.jobs.index') }}" class="btn btn-secondary w-100">Reset</a>
            </div>
        </div>
    </form>

    <!-- Jobs list -->
    <div class="mt-4">
        @forelse ($jobs as $job)
            <div class="card mb-3">
                <div class="card-body">
                    <h4>{{ $job->title }}</h4>
                    <p>{{ $job->description }}</p>
                    <p><strong>Category:</strong> {{ $job->category }}</p>
                    <p><strong>Location:</strong> {{ $job->location }}</p>
                    <p><strong>Country:</strong> {{ $job->country }}</p>
                    <p><strong>Experience Level:</strong> {{ $job->experience_level }}</p>
                    <p><strong>Salary:</strong> {{ $job->salary ?? 'Not specified' }}</p>

                    @if (in_array($job->id, $appliedJobIds))
                        <button class="btn btn-secondary" disabled>Already Applied</button>
                    @else
                        <form method="POST" action="{{ route('agent.jobs.apply', $job->id) }}">
                            @csrf
                            <input type="hidden" name="status" value="pending">
                            <button class="btn btn-success">Apply</button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <div class="alert alert-info">No jobs found.</div>
        @endforelse
    </div>

    <div class="mt-4">
        <a href="{{ route('agent.jobs.applications') }}" class="btn btn-outline-primary">View My Applied Jobs</a>
    </div>
</div>
@endsection
