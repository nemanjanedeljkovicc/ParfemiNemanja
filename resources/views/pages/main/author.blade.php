@extends('layouts.layout')
@section('description')
    Learn more about the author behind our perfume shop, the story behind the brand, and the passion for luxury fragrances.
@endsection

@section('keywords')
    perfume shop author, about the author, fragrance brand creator, perfume website author
@endsection

@section('title')
    About The Author
@endsection
@section('content')
    <section class="author-shell">
        <div class="container">
            <div class="author-hero text-center">
                <div class="author-badge">About The Author</div>
                <h1 class="author-title">The story behind the fragrance experience.</h1>
                <p class="author-subtitle">
                    A personal project shaped by a love for elegant presentation, original perfumes, and a clean online shopping experience.
                </p>
            </div>

            <div class="author-card">
                <div class="row align-items-center">
                    <div class="col-lg-5 mb-4 mb-lg-0">
                        <div class="author-image-wrap">
                            <img src="{{asset('assets/img/author.jpg')}}" alt="Author portrait" class="img-fluid author-image" />
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="author-content">
                            <div class="author-content-badge">Creator</div>
                            <h2 class="author-name">Nemanja Nedeljkovic</h2>
                            <div class="author-highlights">
                                <div class="author-highlight-card">
                                    <div class="author-highlight-icon">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div>
                                        <span class="author-highlight-label">Age</span>
                                        <strong>22</strong>
                                    </div>
                                </div>
                                <div class="author-highlight-card">
                                    <div class="author-highlight-icon">
                                        <i class="fa-solid fa-id-card"></i>
                                    </div>
                                    <div>
                                        <span class="author-highlight-label">Index Number</span>
                                        <strong>30/22</strong>
                                    </div>
                                </div>
                                <div class="author-highlight-card">
                                    <div class="author-highlight-icon">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                    </div>
                                    <div>
                                        <span class="author-highlight-label">Program</span>
                                        <strong>Internet Technologies</strong>
                                    </div>
                                </div>
                                <div class="author-highlight-card">
                                    <div class="author-highlight-icon">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <div>
                                        <span class="author-highlight-label">Email</span>
                                        <strong>nemanja.nedeljkovic.30.22@ict.edu.rs</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
