@extends('layouts.app')


@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        ✅ {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h3 class="mb-4">👤 Update Agent Profile</h3>

            <form action="{{ route('agents.update') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">📞 Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $agent->phone) }}" class="form-control" id="phone" placeholder="+1 234 567 8901">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="yoe" class="form-label">💼 Years of Experience</label>
                        <input type="number" name="yoe" value="{{ old('yoe', $agent->yoe) }}" class="form-control" id="yoe" min="0" placeholder="e.g. 3">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="tagline" class="form-label">📝 Tagline</label>
                        <input type="text" name="tagline" value="{{ old('tagline', $agent->tagline) }}" class="form-control" id="tagline" placeholder="e.g. Laravel Dev | 3+ yrs | Remote OK">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="country" class="form-label">🌍 Country</label>
                        <select name="country" id="country" class="form-select">
                            @php
                                $countries = ['India', 'USA', 'UK', 'Canada', 'Germany', 'Australia', 'Brazil', 'France', 'Japan', 'Other'];
                            @endphp
                            @foreach ($countries as $country)
                                <option value="{{ $country }}" {{ old('country', $agent->country) == $country ? 'selected' : '' }}>
                                    {{ $country }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="resume_url" class="form-label">📄 Resume URL</label>
                        <input type="url" name="resume_url" value="{{ old('resume_url', $agent->resume_url) }}" class="form-control" id="resume_url" placeholder="https://example.com/resume.pdf">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="is_available" class="form-label">✅ Available for Work?</label>
                        <select name="is_available" class="form-select" id="is_available">
                            <option value="1" {{ $agent->is_available ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ !$agent->is_available ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-4">
                        <label for="skills" class="form-label">🧠 Skills</label>
                        <select name="skills[]" id="skills" multiple class="form-select">
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->id }}" 
                                    {{ in_array($skill->id, $agent->skills->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $skill->name }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Hold Ctrl (Cmd on Mac) or Shift to select multiple.</small>
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary px-4">💾 Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
