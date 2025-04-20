@extends('layouts.app')

@section('content')
    @if (auth()->user()->role === 'agent')
        @include('agents.dashboard')
    @elseif (auth()->user()->role === 'recruiter')
        @include('recruiter.dashboard')
    @else
        <div class="container mt-5">
            <div class="alert alert-warning">
                <strong>Oops!</strong> Your role is not recognized.
            </div>
        </div>
    @endif
@endsection
