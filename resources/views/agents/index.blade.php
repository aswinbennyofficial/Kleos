@php
$countries = ['India', 'USA', 'UK', 'Canada', 'Germany', 'Australia', 'Brazil', 'France', 'Japan', 'Other'];
@endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-users me-2 text-primary"></i> Browse Agents</h2>
        <span class="badge bg-primary">{{ $agents->count() }} Results</span>
    </div>
    
    <!-- Filter Form -->
    <div class="filter-section mb-4">
        <h5 class="mb-3"><i class="fas fa-filter me-2"></i> Filter Agents</h5>
        <form action="{{ route('agents.index') }}" method="GET" class="row g-3">
            <div class="col-md-3">
                <label for="skill" class="form-label"><i class="fas fa-tools me-1"></i> Skill</label>
                <select name="skill" id="skill" class="form-select">
                    <option value="">All Skills</option>
                    @foreach($skills as $skill)
                    <option value="{{ $skill->name }}" {{ request('skill') == $skill->name ? 'selected' : '' }}>
                        {{ $skill->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-3">
                <label for="country" class="form-label"><i class="fas fa-globe-americas me-1"></i> Country</label>
                <select name="country" id="country" class="form-select">
                    <option value="">All Countries</option>
                    @foreach($countries as $country)
                    <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>
                        {{ $country }}
                    </option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-3">
                <label for="yoe" class="form-label"><i class="fas fa-briefcase me-1"></i> Experience</label>
                <select name="yoe" id="yoe" class="form-select">
                    <option value="">Any experience</option>
                    <option value="1" {{ request('yoe') == '1' ? 'selected' : '' }}>1+ years</option>
                    <option value="2" {{ request('yoe') == '2' ? 'selected' : '' }}>2+ years</option>
                    <option value="3" {{ request('yoe') == '3' ? 'selected' : '' }}>3+ years</option>
                    <option value="5" {{ request('yoe') == '5' ? 'selected' : '' }}>5+ years</option>
                    <option value="10" {{ request('yoe') == '10' ? 'selected' : '' }}>10+ years</option>
                </select>
            </div>
            
            <div class="col-md-3">
                <label for="available" class="form-label"><i class="fas fa-calendar-check me-1"></i> Availability</label>
                <select name="available" class="form-select">
                    <option value="">Any status</option>
                    <option value="1" {{ request('available') === '1' ? 'selected' : '' }}>Available now</option>
                    <option value="0" {{ request('available') === '0' ? 'selected' : '' }}>Not available</option>
                </select>
            </div>
            
            <div class="col-md-12 d-flex justify-content-end">
                <a href="{{ route('agents.index') }}" class="btn btn-outline-secondary me-2">
                    <i class="fas fa-redo me-1"></i> Reset
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search me-1"></i> Apply Filters
                </button>
            </div>
        </form>
    </div>

    <br>
    <hr>
    
    <!-- Agent List -->
    @forelse ($agents as $agent)
    <div class="agent-card mb-4">
        <div class="d-flex justify-content-between mb-2">
            <h5 class="card-title mb-0">{{ $agent->user->name }}</h5>
            <span class="badge {{ $agent->is_available ? 'bg-success' : 'bg-secondary' }}">
                <i class="fas {{ $agent->is_available ? 'fa-check-circle' : 'fa-times-circle' }} me-1"></i>
                {{ $agent->is_available ? 'Available' : 'Unavailable' }}
            </span>
        </div>
        
        <p class="tagline text-primary mb-3">{{ $agent->tagline ?? 'N/A' }}</p>
        
        <div class="agent-meta">
            <div class="meta-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>{{ $agent->country ?? 'N/A' }}</span>
            </div>
            <div class="meta-item">
                <i class="fas fa-briefcase"></i>
                <span>{{ $agent->yoe }} years experience</span>
            </div>
            {{-- @if($agent->resume_url)
            <div class="meta-item">
                <i class="fas fa-file-alt"></i>
                <a href="{{ $agent->resume_url }}" target="_blank" class="ms-1">View Resume</a>
            </div>
            @endif --}}
        </div>
        
        <div class="skills-tags">
            @foreach($agent->skills as $skill)
            <span class="skill-tag">{{ $skill->name }}</span>
            @endforeach
        </div>
        
        @if($agent->resume_url)
            <div class="mt-3 text-end">
                <a href="{{ $agent->resume_url }}" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-file me-1"></i> View Resume
                </a>
            </div>
        @endif
    </div>
    @empty
    <div class="alert alert-secondary">
        <i class="fas fa-info-circle me-2"></i> No agents found matching your filters.
    </div>
    @endforelse
</div>
@endsection
