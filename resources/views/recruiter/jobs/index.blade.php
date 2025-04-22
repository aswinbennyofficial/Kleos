@extends('layouts.app')

@section('content')
<div class="container">
    <h2>My Job Posts</h2>
    <a href="{{ route('jobs.create') }}" class="btn btn-primary mb-3">Create Job</a>

    @foreach ($jobs as $job)
        <div class="card mb-3">
            <div class="card-body">
                <h4>{{ $job->title }}</h4>
                <p>{{ $job->description }}</p>
                <p><strong>Location:</strong> {{ $job->location ?? 'N/A' }}</p>
                <p><strong>Category:</strong> {{ $job->category ?? 'N/A' }}</p>

                <a href="{{ route('jobs.edit', $job) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this job?')">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
