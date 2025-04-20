@extends('layouts.app')
@section('content')
<div class="container">
    <!-- Success message -->
    @if(session('success') || session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') ?? session('status') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="profile-form-section">
                <h3><i class="fas fa-building"></i> Edit Recruiter Profile</h3>
                
                <form action="{{ route('recruiter.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="company_name" class="form-label">
                                <i class="fas fa-building me-1 text-primary"></i> Company Name
                            </label>
                            <input type="text" name="company_name" 
                                class="form-control @error('company_name') is-invalid @enderror" 
                                value="{{ old('company_name', $recruiterProfile->company_name ?? '') }}" 
                                required>
                            @error('company_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="contact_number" class="form-label">
                                <i class="fas fa-phone me-1 text-primary"></i> Contact Number
                            </label>
                            <input type="text" name="contact_number" 
                                class="form-control @error('contact_number') is-invalid @enderror" 
                                value="{{ old('contact_number', $recruiterProfile->contact_number ?? '') }}"
                                placeholder="+1 234 567 8901">
                            @error('contact_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="industry" class="form-label">
                                <i class="fas fa-industry me-1 text-primary"></i> Industry
                            </label>
                            <input type="text" name="industry" 
                                class="form-control @error('industry') is-invalid @enderror" 
                                value="{{ old('industry', $recruiterProfile->industry ?? '') }}"
                                placeholder="e.g. Technology, Healthcare, Finance">
                            @error('industry')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="country" class="form-label">
                                <i class="fas fa-globe me-1 text-primary"></i> Country
                            </label>
                            <select name="country" id="country" class="form-select @error('country') is-invalid @enderror">
                                <option value="">Select Country</option>
                                @php
                                    $countries = ['India', 'USA', 'UK', 'Canada', 'Germany', 'Australia', 'Brazil', 'France', 'Japan', 'Other'];
                                    $selectedCountry = old('country', $recruiterProfile->country ?? '');
                                @endphp
                                
                                @foreach($countries as $country)
                                    <option value="{{ $country }}" {{ $selectedCountry == $country ? 'selected' : '' }}>
                                        {{ $country }}
                                    </option>
                                @endforeach
                            </select>
                            @error('country')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-12 d-flex justify-content-between mt-4">
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Back to Dashboard
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-1"></i> Update Profile
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection