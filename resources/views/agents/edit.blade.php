<form action="{{ route('agents.update') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $agent->phone) }}" class="form-control" id="phone">
    </div>

    <div class="mb-3">
        <label for="yoe" class="form-label">Years of Experience</label>
        <input type="number" name="yoe" value="{{ old('yoe', $agent->yoe) }}" class="form-control" id="yoe" min="0">
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <input type="text" name="category" value="{{ old('category', $agent->category) }}" class="form-control" id="category">
    </div>

    <div class="mb-3">
        <label for="country" class="form-label">Country</label>
        <input type="text" name="country" value="{{ old('country', $agent->country) }}" class="form-control" id="country">
    </div>

    <div class="mb-3">
        <label for="resume_url" class="form-label">Resume URL</label>
        <input type="url" name="resume_url" value="{{ old('resume_url', $agent->resume_url) }}" class="form-control" id="resume_url">
    </div>

    <div class="mb-3">
        <label for="is_available" class="form-label">Available for Work?</label>
        <select name="is_available" class="form-control" id="is_available">
            <option value="1" {{ $agent->is_available ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ !$agent->is_available ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="skills" class="form-label">Skills</label>
        <select name="skills[]" id="skills" multiple class="form-control">
            @foreach ($skills as $skill)
                <option value="{{ $skill->id }}" 
                    {{ in_array($skill->id, $agent->skills->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $skill->name }}
                </option>
            @endforeach
        </select>
        <small class="text-muted">Hold Ctrl (Cmd on Mac) to select multiple.</small>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>
