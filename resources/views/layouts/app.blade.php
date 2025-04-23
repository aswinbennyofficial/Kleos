<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'AgentConnect') }}</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>K</text></svg>">


    <!-- Bootstrap CSS for layout and styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <style>
        /* Main color variables for easy updating */
/* Base styles and variables */
:root {
  --primary: #4f46e5;
  --primary-hover: #4338ca;
  --secondary: #64748b;
  --success: #10b981;
  --danger: #ef4444;
  --warning: #f59e0b;
  --light: #f8fafc;
  --dark: #1e293b;
  --card-bg: #ffffff;
  --body-bg: #f3f4f6;
  --text-primary: #1e293b;
  --text-secondary: #64748b;
  --text-muted: #94a3b8;
  --border-color: #e2e8f0;
  --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06);
  --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
  --rounded-sm: 0.375rem;
  --rounded-md: 0.5rem;
  --rounded-lg: 0.75rem;
}

body {
  font-family: 'Inter', sans-serif;
  background-color: var(--body-bg);
  color: var(--text-primary);
  line-height: 1.6;
}

/* Enhanced Container */
.container {
  max-width: 1280px;
  padding: 1.5rem;
}

/* Card Styles */
.card {
  background-color: var(--card-bg);
  border: none;
  border-radius: var(--rounded-lg);
  box-shadow: var(--shadow-md);
  transition: all 0.3s ease;
  overflow: hidden;
  margin-bottom: 1.5rem;
}

.card:hover {
  box-shadow: var(--shadow-lg);
  transform: translateY(-3px);
}

.card-header {
  font-weight: 600;
  padding: 1.25rem 1.5rem;
  border-bottom: 1px solid var(--border-color);
}

.card-body {
  padding: 1.5rem;
}

.card-title {
  color: var(--text-primary);
  font-weight: 700;
  font-size: 1.25rem;
  margin-bottom: 1rem;
}

.card-text {
  color: var(--text-secondary);
  margin-bottom: 0.75rem;
}

/* Badge Styling */
.badge {
  padding: 0.5em 0.85em;
  font-weight: 600;
  font-size: 0.75rem;
  border-radius: 50px;
  letter-spacing: 0.5px;
}

.bg-success {
  background-color: var(--success) !important;
}

.bg-secondary {
  background-color: var(--secondary) !important;
}

/* Alert Styling */
.alert {
  border: none;
  border-radius: var(--rounded-md);
  padding: 1rem 1.25rem;
  margin-bottom: 1.5rem;
  border-left: 4px solid transparent;
}

.alert-success {
  background-color: rgba(16, 185, 129, 0.1);
  border-left-color: var(--success);
  color: #065f46;
}

.alert-danger {
  background-color: rgba(239, 68, 68, 0.1);
  border-left-color: var(--danger);
  color: #b91c1c;
}

/* Button Styling */
.btn {
  padding: 0.6rem 1.25rem;
  font-weight: 600;
  border-radius: var(--rounded-md);
  transition: all 0.3s ease;
  border: none;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.btn-lg {
  padding: 0.75rem 1.5rem;
  font-size: 1rem;
}

.btn-primary {
  background-color: var(--primary);
  color: white;
}

.btn-primary:hover {
  background-color: var(--primary-hover);
  transform: translateY(-2px);
  box-shadow: 0 4px 6px rgba(79, 70, 229, 0.2);
}

.btn-success {
  background-color: var(--success);
  color: white;
}

.btn-success:hover {
  background-color: #0ca678;
  transform: translateY(-2px);
  box-shadow: 0 4px 6px rgba(16, 185, 129, 0.2);
}

.btn-link {
  padding: 0.5rem 0.75rem;
  box-shadow: none;
  color: var(--primary);
  text-decoration: none;
}

.btn-link:hover {
  text-decoration: underline;
  background-color: rgba(79, 70, 229, 0.05);
  color: var(--primary-hover);
}

.btn-link.text-danger {
  color: var(--danger);
}

.btn-link.text-danger:hover {
  background-color: rgba(239, 68, 68, 0.05);
  color: #b91c1c;
}

/* Form Elements */
.form-label {
  font-weight: 600;
  color: var(--text-primary);
  margin-bottom: 0.5rem;
  font-size: 0.95rem;
}

.form-control, .form-select {
  border: 1px solid var(--border-color);
  border-radius: var(--rounded-md);
  padding: 0.65rem 1rem;
  transition: all 0.2s ease;
  color: var(--text-primary);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}

.form-control:focus, .form-select:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
}

.form-control::placeholder {
  color: var(--text-muted);
}

.text-muted {
  color: var(--text-muted) !important;
  font-size: 0.875rem;
}

/* Filter Section Specific Styling */
.filter-section {
  background-color: var(--card-bg);
  border-radius: var(--rounded-lg);
  padding: 1.5rem;
  margin-bottom: 1.5rem;
  box-shadow: var(--shadow-sm);
  border-left: 4px solid var(--primary);
}

/* Dashboard Welcome Section */
.welcome-section {
  background: linear-gradient(135deg, var(--primary) 0%, var(--primary-hover) 100%);
  color: white;
  border-radius: var(--rounded-lg);
  padding: 2rem;
  margin-bottom: 1.5rem;
  box-shadow: var(--shadow-md);
}

.welcome-section h3 {
  font-weight: 700;
  margin-bottom: 0.5rem;
  font-size: 1.75rem;
}

.welcome-section p {
  opacity: 0.9;
  font-size: 1.1rem;
  margin-bottom: 1.5rem;
}

/* Dashboard Action Buttons */
.dashboard-action {
  background-color: white;
  border-radius: var(--rounded-lg);
  padding: 1.5rem;
  text-align: center;
  box-shadow: var(--shadow-sm);
  transition: all 0.3s ease;
  border-top: 4px solid transparent;
  height: 100%;
}

.dashboard-action:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow-md);
}

.dashboard-action.primary {
  border-top-color: var(--primary);
}

.dashboard-action.success {
  border-top-color: var(--success);
}

.dashboard-action i {
  font-size: 2.5rem;
  margin-bottom: 1rem;
  color: var(--primary);
}

.dashboard-action h4 {
  font-weight: 600;
  margin-bottom: 0.5rem;
}

.dashboard-action p {
  color: var(--text-secondary);
  font-size: 0.95rem;
}

/* Agent Card Styling */
.agent-card {
  border-radius: var(--rounded-lg);
  background-color: white;
  box-shadow: var(--shadow-sm);
  padding: 1.5rem;
  border-left: 4px solid var(--primary);
  transition: all 0.3s ease;
}

.agent-card:hover {
  box-shadow: var(--shadow-md);
  transform: translateY(-3px);
}

.agent-card .card-title {
  display: flex;
  align-items: center;
  margin-bottom: 1rem;
}

.agent-card .card-title::before {
  content: "👤";
  margin-right: 0.5rem;
  font-size: 1.25rem;
}

.agent-meta {
  display: flex;
  flex-wrap: wrap;
  gap: 0.75rem;
  margin-bottom: 1rem;
}

.meta-item {
  display: flex;
  align-items: center;
  color: var(--text-secondary);
  font-size: 0.95rem;
}

.meta-item i {
  margin-right: 0.25rem;
  color: var(--primary);
}

.skills-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem;
  margin-top: 1rem;
}

.skill-tag {
  background-color: rgba(79, 70, 229, 0.1);
  color: var(--primary);
  font-size: 0.75rem;
  font-weight: 600;
  padding: 0.35em 0.75em;
  border-radius: 50px;
}

/* Update Profile Form */
.profile-form-section {
  background-color: white;
  border-radius: var(--rounded-lg);
  box-shadow: var(--shadow-md);
  padding: 2rem;
}

.profile-form-section h3 {
  color: var(--text-primary);
  font-weight: 700;
  margin-bottom: 1.5rem;
  display: flex;
  align-items: center;
  border-bottom: 2px solid var(--border-color);
  padding-bottom: 1rem;
}

.profile-form-section h3 i {
  color: var(--primary);
  margin-right: 0.5rem;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
  .container {
    padding: 1rem;
  }
  
  .card-body {
    padding: 1.25rem;
  }
  
  .welcome-section {
    padding: 1.5rem;
  }
  
  .welcome-section h3 {
    font-size: 1.5rem;
  }
  
  .btn-lg {
    padding: 0.6rem 1.25rem;
  }
  
  .dashboard-action {
    margin-bottom: 1rem;
  }
}

/* Animations */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}

.card, .alert, .welcome-section, .dashboard-action, .agent-card {
  animation: fadeIn 0.5s ease forwards;
}

/* FontAwesome / Bootstrap Icons additions */
.with-icon {
  display: inline-flex;
  align-items: center;
}

.with-icon i, .with-icon svg {
  margin-right: 0.5rem;
}

/* Custom utility class for specific layouts */
.w-48 {
  width: 48%;
}

.navbar {
  background-color: var(--primary);
  color: white;
}
.navbar .nav-link {
  color: white;
}
.navbar .nav-link:hover {
  color: var(--light);
}



        
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <!-- App name with link to home (only if logged in) -->
            <a class="navbar-brand" href="{{ Auth::check() ? route('home') : '#' }}">
               <b> Kleos </b>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNa? We got you covered!v"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- If logged in, show user-specific links -->
                    @if (Auth::check())

                      @if (Auth::user()->role === 'recruiter')
                        <li class="nav-item">
                            <a class="nav-link btn" href="{{ route('agents.index') }}">
                                <i class="fas fa-users"></i> Browse Agents
                            </a>
                        </li>
                      @endif
                        <a class="nav-link btn" href="{{ Auth::user()->role === 'recruiter' ? url('/recruiter/edit') : url('/agents/edit') }}">
                            <i class="fas fa-user-edit"></i> Edit My Profile
                        </a>
                        
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
