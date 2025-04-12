<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment Platform</title>
</head>
<body>
    <h1>Welcome to the Recruitment Platform</h1>
    <nav>
        <ul>
            <li><a href="{{ route('agents.index') }}">View Agents</a></li>
            <li><a href="{{ route('jobs.index') }}">View Job Posts</a></li>
        </ul>
    </nav>
</body>
</html>
