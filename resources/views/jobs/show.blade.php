<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->title }}</title>
</head>
<body>
    <h1>{{ $job->title }}</h1>
    <p>Category: {{ $job->category }}</p>
    <p>Description: {{ $job->description }}</p>
    <p>Location: {{ $job->location }}</p>

    <!-- Job application form -->
    <form action="{{ route('applications.store') }}" method="POST">
        @csrf
        <input type="hidden" name="agent_id" value="1"> <!-- Replace with actual agent ID -->
        <input type="hidden" name="job_id" value="{{ $job->id }}">
        <button type="submit">Apply</button>
    </form>

    <p><a href="{{ route('jobs.index') }}">Back to job posts</a></p>
</body>
</html>
