<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'AgentConnect') }}</title>

    <!-- Bootstrap CSS for layout and styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <style>
        /* Custom navbar styles */
        .navbar {
            background: linear-gradient(45deg, #007bff, #0056b3);
            border-radius: 5px;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff !important;
            transition: all 0.3s;
        }

        .navbar-brand:hover {
            color: #f0f0f0 !important;
            text-decoration: none;
        }

        .nav-link {
            color: #fff !important;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 10px 15px;
        }

        .nav-link:hover {
            color: #f0f0f0 !important;
            background-color: #0056b3;
            border-radius: 5px;
        }

        .navbar-nav .nav-item + .nav-item {
            margin-left: 15px;
        }

        .navbar-toggler-icon {
            background-color: #fff;
        }

        /* Custom button styling */
        .nav-item a.btn {
            font-weight: bold;
            padding: 8px 20px;
            border-radius: 50px;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            border: none;
            color: white;
            transition: all 0.3s ease;
        }

        .nav-item a.btn:hover {
            background: linear-gradient(135deg, #0072ff, #00c6ff);
            transform: scale(1.05);
        }

        /* Small screen padding */
        .navbar-collapse {
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <!-- App name with link to home (only if logged in) -->
            <a class="navbar-brand" href="{{ Auth::check() ? route('home') : '#' }}">
                {{ config('app.name', 'AgentConnect') }}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- If logged in, show user-specific links -->
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link btn" href="{{ route('agents.index') }}">
                                <i class="fas fa-users"></i> Browse Agents
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn" href="{{ route('agents.edit') }}">
                                <i class="fas fa-user-edit"></i> Edit My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <!-- If not logged in, show login and register links -->
                        <li class="nav-item">
                            <a class="nav-link btn" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn" href="{{ route('register') }}">
                                <i class="fas fa-user-plus"></i> Register
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div id="app" class="container mt-4">
        {{-- @if (Auth::check())
            <p>Logged in as: {{ Auth::user()->name }}</p>
        @endif --}}

        @yield('content')
    </div>

    <!-- Bootstrap JS for interactive elements like navbar toggling -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
