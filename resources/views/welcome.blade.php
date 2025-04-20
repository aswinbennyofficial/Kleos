{{-- Langing page / --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background-color: #f8f9fa;
            padding: 80px 0;
            text-align: center;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: #6c757d;
            margin-bottom: 40px;
        }

        .cta-button {
            font-size: 1.1rem;
            padding: 12px 25px;
        }

        .card-wrapper {
            display: flex;
            justify-content: space-around;
            margin-top: 40px;
        }

        .card {
            width: 18rem;
        }

        .card-body {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <h1 class="hero-title">Welcome to the Recruitment Platform</h1>
                <p class="hero-subtitle">Find top talent, manage agents, and get hired with ease.</p>

                @if(auth()->check())
                <!-- Logged-In User -->
                <div class="mb-4">
                    <h2>Welcome back, {{ auth()->user()->name }}!</h2>
                    <p>Start managing your profile or browse available agents.</p>
                    <a href="{{ route('agents.index') }}" class="btn btn-primary btn-lg cta-button">
                        Browse Agents
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-secondary btn-lg cta-button">
                        Open dashboard
                    </a>
                </div>
                @else
                <!-- Not Logged-In User -->
                <div class="mb-4">
                    <h3>Get Started Today</h3>
                    <p>Sign up or log in to start browsing agents or managing your profile.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg cta-button">
                        Login to Continue
                    </a>
                </div>
                @endif
            </div>
        </section>

        <!-- Platform Features -->
        <section class="card-wrapper">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Feature 1">
                <div class="card-body">
                    <h5 class="card-title">Find Agents</h5>
                    <p class="card-text">Browse through the best agents based on your needs and requirements.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Feature 2">
                <div class="card-body">
                    <h5 class="card-title">Manage Your Profile</h5>
                    <p class="card-text">Update your personal and professional details to stand out in the platform.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Feature 3">
                <div class="card-body">
                    <h5 class="card-title">Get Hired</h5>
                    <p class="card-text">Get noticed by top recruiters and be a part of exciting projects.</p>
                </div>
            </div>
        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
