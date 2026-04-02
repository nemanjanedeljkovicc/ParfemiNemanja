@extends('layouts.layout')

@section('description')
    Contact our perfume shop for product recommendations, order support, and any questions about our fragrances and services.
@endsection

@section('keywords')
    contact perfume shop, fragrance support, perfume recommendations, customer service, perfume store contact
@endsection

@section('title')
    Contact
@endsection

@section('content')
    <section class="contact-shell">
        <div class="container">
            <div class="contact-hero text-center">
                <div class="contact-badge">Contact Us</div>
                <h1 class="contact-title">Let's find the right fragrance experience for you.</h1>
                <p class="contact-subtitle">
                    Whether you have a question about a product, an order, or just need a recommendation, our team is here to help.
                </p>
            </div>

            @if(session('success'))
                <div class="alert alert-success contact-alert">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger contact-alert">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger contact-alert">
                    <ul class="mb-0 pl-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="contact-card">
                <div class="row no-gutters">
                    <div class="col-lg-5">
                        <div class="contact-panel contact-panel-dark">
                            <div class="contact-panel-header">
                                <div class="contact-badge contact-badge-dark">Get in Touch</div>
                                <h3>We are happy to help with every detail.</h3>
                                <p>
                                    Reach out for product questions, support, recommendations, or anything else related to your shopping experience.
                                </p>
                            </div>

                            <div class="contact-info-stack">
                                <div class="contact-info-card">
                                    <div class="contact-info-icon">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div>
                                        <span class="contact-info-label">Phone</span>
                                        <strong>+381 60 123 456</strong>
                                    </div>
                                </div>

                                <div class="contact-info-card">
                                    <div class="contact-info-icon">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <div>
                                        <span class="contact-info-label">Email</span>
                                        <strong>avenue@shop.com</strong>
                                    </div>
                                </div>

                                <div class="contact-info-card">
                                    <div class="contact-info-icon">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div>
                                        <span class="contact-info-label">Location</span>
                                        <strong>Belgrade, Serbia</strong>
                                    </div>
                                </div>

                                <div class="contact-info-card">
                                    <div class="contact-info-icon">
                                        <i class="fa-solid fa-clock"></i>
                                    </div>
                                    <div>
                                        <span class="contact-info-label">Working Hours</span>
                                        <strong>Mon - Fri: 09:00 - 18:00</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="contact-panel contact-panel-light">
                            <div class="contact-form-header">
                                <h3>Send a Message</h3>
                                <p>Fill out the form below and we will get back to you as soon as possible.</p>
                            </div>

                            <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
                                @csrf

                                <div class="form-row">
                                    <div class="form-group col-md-6 contact-form-group">
                                        <label class="contact-label">Your Name</label>
                                        <input type="text" name="name" class="form-control contact-input" placeholder="Enter your full name" value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group col-md-6 contact-form-group">
                                        <label class="contact-label">Your Email</label>
                                        <input type="email" name="email" class="form-control contact-input" placeholder="Enter your email" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="form-group contact-form-group">
                                    <label class="contact-label">Subject</label>
                                    <input type="text" name="subject" class="form-control contact-input" placeholder="What can we help you with?" value="{{ old('subject') }}">
                                </div>

                                <div class="form-group contact-form-group">
                                    <label class="contact-label">Message</label>
                                    <textarea name="message" class="form-control contact-textarea" rows="6" placeholder="Write your message here...">{{ old('message') }}</textarea>
                                </div>

                                <button class="btn btn-dark contact-submit-btn w-100">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-map-card">
                <div class="text-center mb-4">
                    <div class="contact-badge">Our Location</div>
                    <h3 class="contact-map-title">Visit us or find us on the map</h3>
                    <p class="contact-map-subtitle">A premium fragrance destination in the heart of Belgrade.</p>
                </div>

                <div class="map-container contact-map-frame">
                    <iframe
                        src="https://www.google.com/maps?q=Belgrade,Serbia&output=embed"
                        width="100%"
                        height="380"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
