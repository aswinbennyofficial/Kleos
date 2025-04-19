@extends('layouts.app')
@section('content')
    <h2>All Agents</h2>
    @foreach ($agents as $agent)
        <div>
            <strong>{{ $agent->user->name }}</strong> - {{ $agent->category }} ({{ $agent->country }})
            <br>Skills: {{ $agent->skills->pluck('name')->join(', ') }}
        </div>
    @endforeach
@endsection