@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Browse Agents</h2>

        {{-- Filter Form --}}
        <form action="{{ route('agents.index') }}" method="GET" class="row g-3 mb-4">
            <div class="col-md-3">
                <label for="skill" class="form-label">Skill</label>
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
                <label for="country" class="form-label">Country</label>
                <input type="text" name="country" class="form-control" value="{{ request('country') }}" placeholder="e.g. India">
            </div>

            <div class="col-md-3">
                <label for="yoe" class="form-label">Experience (min years)</label>
                <select name="yoe" id="yoe" class="form-select">
                    <option value="">Any</option>
                    <option value="1" {{ request('yoe') == '1' ? 'selected' : '' }}>1+ years</option>
                    <option value="2" {{ request('yoe') == '2' ? 'selected' : '' }}>2+ years</option>
                    <option value="3" {{ request('yoe') == '3' ? 'selected' : '' }}>3+ years</option>
                    <option value="5" {{ request('yoe') == '5' ? 'selected' : '' }}>5+ years</option>
                    <option value="10" {{ request('yoe') == '10' ? 'selected' : '' }}>10+ years</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="available" class="form-label">Availability</label>
                <select name="available" class="form-select">
                    <option value="">Any</option>
                    <option value="1" {{ request('available') === '1' ? 'selected' : '' }}>Available</option>
                    <option value="0" {{ request('available') === '0' ? 'selected' : '' }}>Unavailable</option>
                </select>
            </div>

            <div class="col-md-3 align-self-end">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
        </form>

        {{-- Agent List --}}
        @forelse ($agents as $agent)
            <div class="card mb-3 p-4 shadow-sm rounded">
                <h5 class="card-title">{{ $agent->user->name }}</h5>
                <p class="card-text mb-1"><strong>Tagline:</strong> {{ $agent->tagline ?? 'N/A' }}</p>
                <p class="card-text mb-1"><strong>Country:</strong> {{ $agent->country ?? 'N/A' }}</p>
                <p class="card-text mb-1"><strong>Experience:</strong> {{ $agent->yoe }} yrs</p>
                <p class="card-text mb-1"><strong>Availability:</strong>
                    <span class="badge {{ $agent->is_available ? 'bg-success' : 'bg-secondary' }}">
                        {{ $agent->is_available ? 'Available' : 'Unavailable' }}
                    </span>
                </p>
                <p class="card-text mb-0"><strong>Skills:</strong> {{ $agent->skills->pluck('name')->join(', ') }}</p>
                
                {{-- Resume Link --}}
                @if($agent->resume_url)
                    <p class="card-text mb-0"><strong>Resume:</strong> <a href="{{ $agent->resume_url }}" target="_blank">View Resume</a></p>
                @else
                    <p class="card-text mb-0"><strong>Resume:</strong> Not available</p>
                @endif
            </div>
        @empty
            <p>No agents found matching your filters.</p>
        @endforelse
    </div>
@endsection
