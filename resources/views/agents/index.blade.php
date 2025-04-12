<!DOCTYPE html>
<html>
<head>
    <title>Agents</title>
</head>
<body>
    <h1>Agents List</h1>
    @foreach ($agents as $agent)
        <div>
            <strong>Agent ID:</strong> {{ $agent->id }}<br>
            <strong>Phone:</strong> {{ $agent->phone }}<br>
            <strong>Category:</strong> {{ $agent->category }}<br>
            <strong>Country:</strong> {{ $agent->country }}<br>
            <hr>
        </div>
    @endforeach
</body>
</html>