@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm rounded-lg">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('Dashboard') }}</h4>
                    <span class="badge bg-light text-dark">{{ auth()->user()->role }}</span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="mb-4">
                        <h3 class="fw-bold">Welcome back, {{ auth()->user()->name }}!</h3>
                        <p>{{ __('You are logged in and ready to manage your profile.') }}</p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <a href="{{ route('agents.edit') }}" class="btn btn-primary btn-lg w-48">
                            <i class="bi bi-person-circle"></i> Edit My Profile
                        </a>
                        <a href="{{ route('agents.index') }}" class="btn btn-success btn-lg w-48">
                            <i class="bi bi-person-lines-fill"></i> Browse Agents
                        </a>
                    </div>

                    <!-- Additional helpful links -->
                    <div class="mt-4">
                        {{-- <a href="{{ route('profile.show') }}" class="btn btn-link text-secondary">
                            <i class="bi bi-file-earmark-person"></i> View Profile
                        </a> --}}
                        <a href="{{ route('logout') }}" class="btn btn-link text-danger">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
