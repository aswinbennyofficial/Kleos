@extends('layouts.app')
@section('content')
<div class="container">
    <!-- Success message -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="profile-form-section">
                <h3><i class="fas fa-user-edit"></i> Update Your Agent Profile</h3>
                
                <form action="{{ route('agents.update') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="phone" class="form-label">
                                <i class="fas fa-phone me-1 text-primary"></i> Phone Number
                            </label>
                            <input type="text" name="phone" value="{{ old('phone', $agent->phone) }}" 
                                class="form-control @error('phone') is-invalid @enderror" 
                                id="phone" placeholder="+1 234 567 8901">
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="yoe" class="form-label">
                                <i class="fas fa-briefcase me-1 text-primary"></i> Years of Experience
                            </label>
                            <input type="number" name="yoe" value="{{ old('yoe', $agent->yoe) }}" 
                                class="form-control @error('yoe') is-invalid @enderror" 
                                id="yoe" min="0" placeholder="e.g. 3">
                            @error('yoe')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-4">
                            <label for="tagline" class="form-label">
                                <i class="fas fa-comment-alt me-1 text-primary"></i> Professional Tagline
                            </label>
                            <input type="text" name="tagline" value="{{ old('tagline', $agent->tagline) }}" 
                                class="form-control @error('tagline') is-invalid @enderror" 
                                id="tagline" placeholder="e.g. Laravel Dev | 3+ yrs | Remote OK">
                            <div class="form-text">A brief description of your professional identity (appears in search results)</div>
                            @error('tagline')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="country" class="form-label">
                                <i class="fas fa-globe me-1 text-primary"></i> Country
                            </label>
                            <select name="country" id="country" class="form-select @error('country') is-invalid @enderror">
                                @php
                                    $countries = ['India', 'USA', 'UK', 'Canada', 'Germany', 'Australia', 'Brazil', 'France', 'Japan', 'Other'];
                                @endphp
                                @foreach ($countries as $country)
                                    <option value="{{ $country }}" {{ old('country', $agent->country) == $country ? 'selected' : '' }}>
                                        {{ $country }}
                                    </option>
                                @endforeach
                            </select>
                            @error('country')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="resume_url" class="form-label">
                                <i class="fas fa-file-pdf me-1 text-primary"></i> Resume URL
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                <input type="url" name="resume_url" value="{{ old('resume_url', $agent->resume_url) }}" 
                                    class="form-control @error('resume_url') is-invalid @enderror" 
                                    id="resume_url" placeholder="https://example.com/resume.pdf">
                            </div>
                            <div class="form-text">Link to your resume (PDF recommended)</div>
                            @error('resume_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="is_available" class="form-label">
                                <i class="fas fa-calendar-check me-1 text-primary"></i> Available for Work?
                            </label>
                            <select name="is_available" class="form-select @error('is_available') is-invalid @enderror" id="is_available">
                                <option value="1" {{ $agent->is_available ? 'selected' : '' }}>Yes, I'm available</option>
                                <option value="0" {{ !$agent->is_available ? 'selected' : '' }}>No, I'm not available</option>
                            </select>
                            @error('is_available')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-4">
                            <label for="skills" class="form-label">
                                <i class="fas fa-tools me-1 text-primary"></i> Professional Skills
                            </label>
                            <select name="skills[]" id="skills" multiple class="form-select @error('skills') is-invalid @enderror" style="height: 150px;">
                                @foreach ($skills as $skill)
                                    <option value="{{ $skill->id }}" 
                                        {{ in_array($skill->id, $agent->skills->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $skill->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-text"><i class="fas fa-info-circle me-1"></i> Hold Ctrl (Cmd on Mac) or Shift to select multiple skills.</div>
                            @error('skills')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-12 d-flex justify-content-between">
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