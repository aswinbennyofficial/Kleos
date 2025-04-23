@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fas fa-briefcase me-2"></i>Create Job Post</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('jobs.store') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Job Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="category" class="form-label">Select Category</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="">Choose a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="country" class="form-label">Select Country</label>
                            <select class="form-select" id="country" name="country" required>
                                <option value="">Choose a country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary (Optional)</label>
                            <input type="number" class="form-control" id="salary" name="salary" min="0" step="any"
                                value="{{ old('salary', isset($job) ? $job->salary : '') }}">
                            <div class="form-text text-muted">Enter salary in numbers only, leave empty if not applicable.</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="experience_level" class="form-label">Select Experience Level</label>
                            <select class="form-select" id="experience_level" name="experience_level" required>
                                <option value="">Choose experience level</option>
                                <option value="Intern">Intern</option>
                                <option value="Entry">Entry</option>
                                <option value="Mid">Mid</option>
                                <option value="Senior">Senior</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location">
                            <div class="form-text text-muted">Leave empty for remote positions</div>
                        </div>
                        
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Post Job
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection