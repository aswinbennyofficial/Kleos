<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $agent->name }}'s Profile</title>
</head>
<body>
    <h1>{{ $agent->name }}'s Profile</h1>
    <p>Phone: {{ $agent->phone }}</p>
    <p>Experience: {{ $agent->yoe }} years</p>
    <p>Category: {{ $agent->category }}</p>
    <p>Country: {{ $agent->country }}</p>
    <p><a href="{{ route('agents.index') }}">Back to agents</a></p>
</body>
</html>
