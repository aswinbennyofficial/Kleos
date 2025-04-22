<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kleos - Connect with Top Talent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <style>
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

        /* Navbar styling */
        .navbar {
            background-color: var(--primary);
            box-shadow: var(--shadow-md);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .nav-link {
            font-weight: 600;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: var(--rounded-md);
        }

        /* Hero section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-hover) 100%);
            color: white;
            padding: 5rem 0;
            text-align: center;
            border-radius: 0 0 var(--rounded-lg) var(--rounded-lg);
            margin-bottom: 4rem;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            letter-spacing: -0.025em;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .hero-subtitle {
            font-size: 1.25rem;
            font-weight: 500;
            margin-bottom: 2.5rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.9;
        }

        .welcome-back {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: var(--rounded-lg);
            padding: 2rem;
            margin-bottom: 2rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* CTA Buttons */
        .cta-button {
            padding: 0.75rem 2rem;
            font-weight: 700;
            border-radius: var(--rounded-md);
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            margin: 0 0.5rem 1rem 0.5rem;
        }

        .btn-primary {
            background-color: white;
            color: var(--primary);
            border: none;
        }

        .btn-primary:hover {
            background-color: var(--light);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            color: var(--primary); /* Fixed: text color on hover */
        }

        .btn-secondary {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            color: white; /* Fixed: text color on hover */
        }

        /* Features section */
        .features-section {
            padding: 4rem 0;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2.5rem;
            text-align: center;
            color: var(--text-primary);
        }

        .feature-card {
            background-color: var(--card-bg);
            border-radius: var(--rounded-lg);
            border: none;
            box-shadow: var(--shadow-md);
            height: 100%;
            transition: all 0.3s ease;
            overflow: hidden;
            border-top: 4px solid var(--primary);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
            display: inline-block;
            padding: 1rem;
            background-color: rgba(79, 70, 229, 0.1);
            border-radius: 50%;
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-primary);
        }

        .feature-description {
            color: var(--text-secondary);
            font-size: 1rem;
            line-height: 1.6;
        }

        /* User type section */
        .user-type-section {
            padding: 3rem 0;
            background-color: var(--light);
            border-radius: var(--rounded-lg);
            margin: 2rem 0;
        }

        .user-type-card {
            background: white;
            border-radius: var(--rounded-lg);
            padding: 2rem;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            height: 100%;
            border-left: 4px solid var(--primary);
        }

        .user-type-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .user-type-icon {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        /* Footer section */
        .footer {
            background-color: var(--dark);
            color: white;
            padding: 3rem 0;
            margin-top: 4rem;
        }

        .footer-title {
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.25rem;
        }

        .footer-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            display: block;
            margin-bottom: 0.75rem;
            transition: all 0.3s ease;
        }

        .footer-link:hover {
            color: white;
            transform: translateX(5px);
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .hero-section {
                padding: 3rem 0;
            }
            
            .feature-card, .user-type-card {
                margin-bottom: 2rem;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.5s ease forwards;
        }

        .delay-1 {
            animation-delay: 0.1s;
        }

        .delay-2 {
            animation-delay: 0.2s;
        }

        .delay-3 {
            animation-delay: 0.3s;
        }

        .delay-4 {
            animation-delay: 0.4s;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <b>Kleos</b>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- If logged in, show Dashboard and Logout -->
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus"></i> Register
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container hero-content">
            <h1 class="hero-title animate-fadeInUp">Connect Top Talent with Great Opportunities</h1>
            <p class="hero-subtitle animate-fadeInUp delay-1">Kleos is the premier platform that connects skilled agents with recruiters looking for the perfect fit.</p>
            
            @if(Auth::check())
                <div class="welcome-back animate-fadeInUp delay-2">
                    <h2 class="mb-3">Welcome back, {{ Auth::user()->name }}!</h2>
                    <p>Access your personalized dashboard to manage your activities.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary btn-lg cta-button">
                        <i class="fas fa-tachometer-alt me-2"></i> Go to Dashboard
                    </a>
                </div>
            @else
                <div class="animate-fadeInUp delay-2">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg cta-button">
                        <i class="fas fa-sign-in-alt me-2"></i> Sign In
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-secondary btn-lg cta-button">
                        <i class="fas fa-user-plus me-2"></i> Create Account
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title animate-fadeInUp">Our Platform Features</h2>
            
            <div class="row">
                <div class="col-md-4 mb-4 animate-fadeInUp delay-1">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="feature-title">Find Talent</h3>
                        <p class="feature-description">
                            Browse through our extensive database of qualified agents with diverse skills and expertise.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4 animate-fadeInUp delay-2">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h3 class="feature-title">Manage Applications</h3>
                        <p class="feature-description">
                            Easily track and respond to job applications from top talent in one centralized dashboard.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4 animate-fadeInUp delay-3">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-comment-dots"></i>
                        </div>
                        <h3 class="feature-title">Fast Communication</h3>
                        <p class="feature-description">
                            Connect directly with agents or recruiters through our streamlined messaging system.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- User Type Section -->
    <section class="user-type-section">
        <div class="container">
            <h2 class="section-title animate-fadeInUp">Who Uses Kleos?</h2>
            
            <div class="row">
                <div class="col-md-6 mb-4 animate-fadeInUp delay-1">
                    <div class="user-type-card">
                        <div class="user-type-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3 class="mb-3">For Recruiters</h3>
                        <ul class="ps-3">
                            <li class="mb-2">Access a pool of verified skilled agents</li>
                            <li class="mb-2">Post job opportunities effortlessly</li>
                            <li class="mb-2">Manage and review applications</li>
                            <li class="mb-2">Get automated response tracking</li>
                        </ul>
                        @if(!Auth::check() || Auth::user()->role !== 'recruiter')
                            <a href="{{ route('register') }}" class="btn btn-primary mt-3">
                                <i class="fas fa-user-plus me-2"></i> Register as Recruiter
                            </a>
                        @endif
                    </div>
                </div>
                
                <div class="col-md-6 mb-4 animate-fadeInUp delay-2">
                    <div class="user-type-card">
                        <div class="user-type-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h3 class="mb-3">For Agents</h3>
                        <ul class="ps-3">
                            <li class="mb-2">Create a professional profile to showcase skills</li>
                            <li class="mb-2">Browse and apply to relevant job postings</li>
                            <li class="mb-2">Track application status in real-time</li>
                            <li class="mb-2">Get matched with opportunities suited to your skills</li>
                        </ul>
                        @if(!Auth::check() || Auth::user()->role !== 'agent')
                            <a href="{{ route('register') }}" class="btn btn-primary mt-3">
                                <i class="fas fa-user-plus me-2"></i> Register as Agent
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials/Stats Section -->
    <section class="container py-5 animate-fadeInUp">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="p-4 bg-white rounded-lg shadow-sm">
                    <h3 class="display-4 fw-bold text-primary">500+</h3>
                    <p class="lead">Active Agents</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="p-4 bg-white rounded-lg shadow-sm">
                    <h3 class="display-4 fw-bold text-primary">300+</h3>
                    <p class="lead">Recruiters</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="p-4 bg-white rounded-lg shadow-sm">
                    <h3 class="display-4 fw-bold text-primary">1000+</h3>
                    <p class="lead">Job Matches</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call To Action -->
    <section class="container text-center py-5 animate-fadeInUp">
        <div class="bg-white p-5 rounded-lg shadow-lg" style="border-top: 4px solid var(--primary);">
            <h2 class="mb-4">Ready to Get Started?</h2>
            <p class="lead mb-4">Join our growing community of recruiters and agents today!</p>
            @if(!Auth::check())
                <a href="{{ route('register') }}" class="btn btn-lg btn-primary px-5 py-3">
                    <i class="fas fa-rocket me-2"></i> Join Kleos Now
                </a>
            @else
                <a href="{{ route('home') }}" class="btn btn-lg btn-primary px-5 py-3">
                    <i class="fas fa-tachometer-alt me-2"></i> Go to Dashboard
                </a>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h4 class="footer-title">Kleos</h4>
                    <p>The premier platform connecting recruiters with talented agents for mutual success.</p>
                </div>
                
                <div class="col-md-2 mb-4">
                    <h5 class="footer-title">Company</h5>
                    <a href="#" class="footer-link">About Us</a>
                    <a href="#" class="footer-link">Careers</a>
                    <a href="#" class="footer-link">Contact</a>
                </div>
                
                <div class="col-md-2 mb-4">
                    <h5 class="footer-title">Resources</h5>
                    <a href="#" class="footer-link">Blog</a>
                    <a href="#" class="footer-link">FAQ</a>
                    <a href="#" class="footer-link">Support</a>
                </div>
                
                <div class="col-md-4 mb-4">
                    <h5 class="footer-title">Connect With Us</h5>
                    <div class="d-flex">
                        <a href="#" class="footer-link me-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="footer-link me-3"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="footer-link me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="footer-link me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4 pt-4 border-top border-secondary">
                <div class="col-md-6">
                    <p>&copy; 2025 Kleos. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="footer-link me-3">Privacy Policy</a>
                    <a href="#" class="footer-link">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>