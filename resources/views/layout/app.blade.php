<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'AgentConnect') }}</title>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body>
    <div id="app" class="container mt-4">
        @if (Auth::check())
            <p>Logged in as: {{ Auth::user()->name }}</p>
        @endif

        @yield('content')
    </div>

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>
</html>
