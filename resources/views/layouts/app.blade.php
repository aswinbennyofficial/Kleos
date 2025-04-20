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
        /* Main color variables for easy updating */
:root {
  --primary-color: #2563eb;
  --primary-hover: #1d4ed8;
  --secondary-color: #475569;
  --accent-color: #06b6d4;
  --success-color: #10b981;
  --light-color: #f8fafc;
  --dark-color: #1e293b;
  --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

body {
  font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
  background-color: #f9fafb;
  color: #334155;
  line-height: 1.6;
}

/* Enhanced Navbar Styles */
.navbar {
  background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
  padding: 1rem 2rem;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  margin-bottom: 2rem;
  border-radius: 0;
}

.navbar-brand {
  font-size: 1.7rem;
  font-weight: 700;
  color: white !important;
  letter-spacing: 0.5px;
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
}

.nav-link {
  font-size: 1rem;
  font-weight: 500;
  padding: 0.8rem 1.2rem;
  margin: 0 0.2rem;
  border-radius: 8px;
  transition: all 0.3s ease;
}

.nav-item a.btn {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  font-weight: 600;
}

.nav-item a.btn:hover {
  background: rgba(255, 255, 255, 0.25);
  transform: translateY(-3px);
  box-shadow: 0 7px 14px rgba(0, 0, 0, 0.15);
}

/* Container styling */
.container {
  padding: 2rem 1.5rem;
  max-width: 1200px;
}

/* Card styling */
.card {
  border: none;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: var(--card-shadow);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  margin-bottom: 2rem;
  background: white;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.card-title {
  font-size: 1.4rem;
  font-weight: 700;
  color: var(--dark-color);
  margin-bottom: 1rem;
}

.card-text {
  color: var(--secondary-color);
  font-size: 1rem;
  line-height: 1.7;
}

/* Badge styling */
.badge {
  padding: 0.5em 1em;
  font-weight: 600;
  letter-spacing: 0.5px;
  border-radius: 6px;
  text-transform: uppercase;
  font-size: 0.75rem;
}

.bg-success {
  background-color: var(--success-color) !important;
  color: white;
}

.bg-secondary {
  background-color: var(--secondary-color) !important;
  color: white;
}

/* Filter section styling */
.filter-section {
  background: white;
  border-radius: 12px;
  padding: 1.5rem;
  margin-bottom: 2rem;
  box-shadow: var(--card-shadow);
  border-left: 5px solid var(--accent-color);
}

/* Form elements styling */
input, select, textarea {
  border-radius: 8px;
  border: 1px solid #e2e8f0;
  padding: 0.75rem 1rem;
  font-size: 1rem;
  transition: all 0.2s ease;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

input:focus, select:focus, textarea:focus {
  border-color: var(--primary-color);
  outline: none;
  box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
}

/* Button styling */
.btn {
  padding: 0.65rem 1.5rem;
  font-weight: 600;
  border-radius: 8px;
  transition: all 0.3s ease;
  text-transform: none;
  letter-spacing: 0.3px;
}

.btn-primary {
  background-color: var(--primary-color);
  border: none;
  box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
}

.btn-primary:hover {
  background-color: var(--primary-hover);
  transform: translateY(-2px);
  box-shadow: 0 7px 10px rgba(37, 99, 235, 0.3);
}

.btn-secondary {
  background-color: var(--secondary-color);
  border: none;
}

/* Animation for cards and elements */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

.card, .filter-section {
  animation: fadeIn 0.6s ease forwards;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .navbar {
    padding: 0.8rem 1rem;
  }
  
  .navbar-brand {
    font-size: 1.4rem;
  }
  
  .container {
    padding: 1rem;
  }
  
  .card-title {
    font-size: 1.2rem;
  }
}

/* Custom scrollbar */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
  background: var(--secondary-color);
  border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
  background: var(--primary-color);
}

/* Typography enhancements */
h1, h2, h3, h4, h5, h6 {
  font-weight: 700;
  color: var(--dark-color);
  margin-bottom: 1rem;
}

h1 { font-size: 2.25rem; }
h2 { font-size: 1.875rem; }
h3 { font-size: 1.5rem; }

/* Utility classes */
.text-primary { color: var(--primary-color) !important; }
.text-accent { color: var(--accent-color) !important; }
.border-primary { border-color: var(--primary-color) !important; }
.bg-gradient-primary { 
  background: linear-gradient(135deg, var(--primary-color), var(--primary-hover)) !important;
  color: white;
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
