@extends('layouts.layout')

@section('description')
    Neki opis
@endsection

@section('keywords')
    Neke kljucne reci
@endsection

@section('title')
    Register
@endsection

@section('content')
    <section class="auth-shell">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-11">
                    <div class="auth-card">
                        <div class="row no-gutters">
                            <div class="col-lg-4">
                                <div class="auth-panel auth-panel-dark auth-panel-tall">
                                    <div class="auth-badge">New Account</div>
                                    <h2 class="auth-heading">Create your account and start exploring.</h2>
                                    <p class="auth-subtext">
                                        Join the shop to save your cart, browse premium collections, and enjoy a smoother shopping experience.
                                    </p>
                                    <div class="auth-feature-list">
                                        <div class="auth-feature-item">
                                            <i class="fa-solid fa-user-check"></i>
                                            <span>Personalized shopping experience</span>
                                        </div>
                                        <div class="auth-feature-item">
                                            <i class="fa-solid fa-gift"></i>
                                            <span>Access special discounted offers</span>
                                        </div>
                                        <div class="auth-feature-item">
                                            <i class="fa-solid fa-heart"></i>
                                            <span>Build your own fragrance routine</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="auth-panel auth-panel-light auth-panel-tall">
                                    <div class="auth-form-header">
                                        <h3>Register</h3>
                                        <p>Fill in your details to create a new customer account.</p>
                                    </div>

                                    <form method="POST" action="/register" class="auth-form">
                                        @csrf

                                        <div class="form-row">
                                            <div class="form-group col-md-6 auth-form-group">
                                                <label class="auth-label">Name</label>
                                                <input type="text" name="name" class="form-control auth-input" value="{{ old('name') }}" placeholder="Your name">
                                                @error('name')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6 auth-form-group">
                                                <label class="auth-label">Surname</label>
                                                <input type="text" name="surname" class="form-control auth-input" value="{{ old('surname') }}" placeholder="Your surname">
                                                @error('surname')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6 auth-form-group">
                                                <label class="auth-label">Email</label>
                                                <input type="email" name="email" class="form-control auth-input" value="{{ old('email') }}" placeholder="Your email address">
                                                @error('email')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6 auth-form-group">
                                                <label class="auth-label">Phone</label>
                                                <input type="text" name="phone" class="form-control auth-input" value="{{ old('phone') }}" placeholder="Your phone number">
                                                @error('phone')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6 auth-form-group">
                                                <label class="auth-label">Age</label>
                                                <input type="number" name="age" class="form-control auth-input" value="{{ old('age') }}" placeholder="Your age">
                                                @error('age')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6 auth-form-group">
                                                <label class="auth-label">Gender</label>
                                                <select name="gender" class="form-control auth-input">
                                                    <option value="">Select gender</option>
                                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                                </select>
                                                @error('gender')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6 auth-form-group">
                                                <label class="auth-label">Password</label>
                                                <input type="password" name="password" class="form-control auth-input" placeholder="Create a password">
                                                @error('password')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6 auth-form-group">
                                                <label class="auth-label">Confirm Password</label>
                                                <input type="password" name="password_confirmation" class="form-control auth-input" placeholder="Repeat your password">
                                            </div>
                                        </div>

                                        <button class="btn btn-dark auth-submit-btn w-100">
                                            Create Account
                                        </button>
                                    </form>

                                    <p class="auth-switch-text">
                                        Already have an account?
                                        <a href="/login">Log in here</a>
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
