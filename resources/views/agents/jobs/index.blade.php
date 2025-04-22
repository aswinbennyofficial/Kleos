@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Available Job Posts</h3>

    <!-- Filter form -->
    <form method="GET" action="{{ route('agent.jobs.filter') }}">
        <div class="row g-3">
            <!-- Category dropdown -->
            <div class="col-md-4">
                <select name="category" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Location dropdown -->
            <div class="col-md-4">
                <select name="country" class="form-control">
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Experience level dropdown -->
            <div class="col-md-4">
                <select name="experience_level" class="form-control">
                    <option value="">Select Experience Level</option>
                    <option value="Intern" {{ request('experience_level') == 'Intern' ? 'selected' : '' }}>Intern</option>
                    <option value="Entry" {{ request('experience_level') == 'Entry' ? 'selected' : '' }}>Entry</option>
                    <option value="Mid" {{ request('experience_level') == 'Mid' ? 'selected' : '' }}>Mid</option>
                    <option value="Senior" {{ request('experience_level') == 'Senior' ? 'selected' : '' }}>Senior</option>
                </select>
            </div>
        </div>

        <div class="mt-3">
            <button class="btn btn-primary">Filter Jobs</button>
            <a href="{{ route('agent.jobs.index') }}" class="btn btn-secondary">Reset</a>
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


                    @php
                        $existingApplication = \App\Models\Application::where('agent_id', Auth::id())
                                                                    ->where('job_id', $job->id)
                                                                    ->first();
                    @endphp

                    @if ($existingApplication)
                        <button class="btn btn-secondary" disabled>Already Applied</button>
                    @else
                        <form method="POST" action="{{ route('agent.jobs.apply', $job->id) }}">
                            @csrf
                            <button class="btn btn-success">Apply</button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <div class="alert alert-info">No jobs found.</div>
        @endforelse
    </div>
</div>
@endsection
