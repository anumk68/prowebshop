@extends('frontend.layout.app')

@section('title', '404 - Page Not Found')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh">
    <div class="text-center">
        <div class="mb-4">
            <i class="bi bi-exclamation-triangle display-1 text-warning"></i>
        </div>
        <h1 class="display-3 fw-bold">404</h1>
        <p class="fs-4 text-muted">Oops! The page you are looking for doesn't exist.</p>
        <a href="{{ url('/') }}" >
            <i class="bi bi-house-door me-2"></i> <button class="btn_theme"> Go to Homepage</button>
        </a>
    </div>
</div>
@endsection
