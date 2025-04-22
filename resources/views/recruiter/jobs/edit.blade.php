@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Job Post</h4>
                    <a href="{{ route('jobs.index') }}" class="btn btn-link">
                        <i class="fas fa-arrow-left"></i> Back to Jobs
                    </a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('jobs.update', $job->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $job->title }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Job Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required>{{ $job->description }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="category" class="form-label">Select Category</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="">Choose a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category }}" {{ $job->category === $category ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="country" class="form-label">Select Country</label>
                            <select class="form-select" id="country" name="country" required>
                                <option value="">Choose a country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country }}" {{ $job->country === $country ? 'selected' : '' }}>{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="experience_level" class="form-label">Select Experience Level</label>
                            <select class="form-select" id="experience_level" name="experience_level" required>
                                <option value="">Choose experience level</option>
                                <option value="Intern" {{ $job->experience_level === 'Intern' ? 'selected' : '' }}>Intern</option>
                                <option value="Entry" {{ $job->experience_level === 'Entry' ? 'selected' : '' }}>Entry</option>
                                <option value="Mid" {{ $job->experience_level === 'Mid' ? 'selected' : '' }}>Mid</option>
                                <option value="Senior" {{ $job->experience_level === 'Senior' ? 'selected' : '' }}>Senior</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ $job->location }}">
                            <div class="form-text text-muted">Leave empty for remote positions</div>
                        </div>
                        
                        <div class="mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-2"></i>Update Job
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection