@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Job Post</h2>
    <form method="POST" action="{{ route('jobs.update', $job) }}">
        @csrf
        @method('PUT')

        <input name="title" class="form-control mb-2" value="{{ $job->title }}" required>
        <textarea name="description" class="form-control mb-2" required>{{ $job->description }}</textarea>

        <select name="category" class="form-control mb-2">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category }}" {{ $job->category === $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
            @endforeach
        </select>

        <select name="country" class="form-control mb-2">
            <option value="">Select Country</option>
            @foreach ($countries as $country)
                <option value="{{ $country }}" {{ $job->country === $country ? 'selected' : '' }}>
                    {{ $country }}
                </option>
            @endforeach
        </select>

        <input name="location" class="form-control mb-2" value="{{ $job->location }}">

        <select name="experience_level" class="form-control mb-2">
            <option value="Intern" {{ $job->experience_level === 'Intern' ? 'selected' : '' }}>Intern</option>
            <option value="Entry" {{ $job->experience_level === 'Entry' ? 'selected' : '' }}>Entry</option>
            <option value="Mid" {{ $job->experience_level === 'Mid' ? 'selected' : '' }}>Mid</option>
            <option value="Senior" {{ $job->experience_level === 'Senior' ? 'selected' : '' }}>Senior</option>
        </select>

        <input type="number" name="salary" class="form-control mb-2" value="{{ $job->salary }}" placeholder="Salary">

        <button class="btn btn-primary">Update Job</button>
    </form>
</div>
@endsection
