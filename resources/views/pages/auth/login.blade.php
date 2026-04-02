@extends('layouts.layout')

@section('description')
    Neki opis
@endsection

@section('keywords')
    Neke kljucne reci
@endsection

@section('title')
    Login
@endsection

@section('content')
    <section class="auth-shell">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="auth-card">
                        <div class="row no-gutters">
                            <div class="col-lg-5">
                                <div class="auth-panel auth-panel-dark">
                                    <div class="auth-badge">Welcome Back</div>
                                    <h2 class="auth-heading">Sign in to your fragrance account.</h2>
                                    <p class="auth-subtext">
                                        Access your cart, manage your profile, and continue exploring premium perfumes.
                                    </p>
                                    <div class="auth-feature-list">
                                        <div class="auth-feature-item">
                                            <i class="fa-solid fa-bag-shopping"></i>
                                            <span>Quick access to your cart</span>
                                        </div>
                                        <div class="auth-feature-item">
                                            <i class="fa-solid fa-spray-can-sparkles"></i>
                                            <span>Discover elegant signature scents</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div class="auth-panel auth-panel-light">
                                    <div class="auth-form-header">
                                        <h3>Login</h3>
                                        <p>Enter your email and password to continue.</p>
                                    </div>

                                    @if(session('error'))
                                        <div class="alert alert-danger auth-alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="/login" class="auth-form">
                                        @csrf

                                        <div class="form-group auth-form-group">
                                            <label class="auth-label">Email</label>
                                            <input
                                                type="email"
                                                name="email"
                                                class="form-control auth-input"
                                                placeholder="Enter your email"
                                                value="{{ old('email') }}"
                                                required
                                            >
                                            @error('email')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group auth-form-group">
                                            <label class="auth-label">Password</label>
                                            <input
                                                type="password"
                                                name="password"
                                                class="form-control auth-input"
                                                placeholder="Enter your password"
                                                required
                                            >
                                            @error('password')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-dark auth-submit-btn w-100">
                                            Log In
                                        </button>
                                    </form>

                                    <p class="auth-switch-text">
                                        Don't have an account?
                                        <a href="/register">Create one here</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
