@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Job Post</h2>
    <form method="POST" action="{{ route('jobs.store') }}">
        @csrf

        <input name="title" class="form-control mb-2" placeholder="Title" required>
        <textarea name="description" class="form-control mb-2" placeholder="Description" required></textarea>

        <select name="category" class="form-control mb-2">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category }}">{{ $category }}</option>
            @endforeach
        </select>

        <select name="country" class="form-control mb-2">
            <option value="">Select Country</option>
            @foreach ($countries as $country)
                <option value="{{ $country }}">{{ $country }}</option>
            @endforeach
        </select>

        <input name="location" class="form-control mb-2" placeholder="Location">
        
        <select name="experience_level" class="form-control mb-2">
            <option value="">Select Experience Level</option>
            <option value="Intern">Intern</option>
            <option value="Entry">Entry</option>
            <option value="Mid">Mid</option>
            <option value="Senior">Senior</option>
        </select>

        <input type="number" name="salary" class="form-control mb-2" placeholder="Salary">

        <button class="btn btn-success">Post Job</button>
    </form>
</div>
@endsection
