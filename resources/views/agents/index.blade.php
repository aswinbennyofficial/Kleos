<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agents</title>
</head>
<body>
    <h1>Agents</h1>
    <ul>
        @foreach($agents as $agent)
            <li><a href="{{ route('agents.show', $agent->id) }}">{{ $agent->name }}</a></li>
        @endforeach
    </ul>
</body>
</html>
