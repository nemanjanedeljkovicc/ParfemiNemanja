@extends('layouts.layout')
@section('description')
    Discover original perfumes, luxury fragrances, and best-selling scent collections at great prices in our online perfume shop.
@endsection
@section('keywords')
    original perfumes, perfume shop, luxury fragrances, online perfumes, women's perfumes, men's perfumes, discounted perfumes
@endsection
@section('title')
    Home
@endsection

@section('content')
    <div class="container-fluid p-3 position-relative">
        <div class="img-home">
            <img class="w-100" src="{{ asset('assets/img/img.png') }}" alt="Main perfumes" />
        </div>
        <div class="overlay-text d-flex flex-column justify-content-center align-items-center text-center">
            <h2 class="fw-bold mb-3 text-white">Original Perfumes</h2>
            <h3 class="mb-3 text-white">The best prices</h3>
            <p class="mb-0 text-white">Save up to 60% by shopping online at Avenue & Lecarte perfumery</p>
        </div>
    </div>
    <div class="container mt-5 mb-5 main">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                <img src="{{asset('assets/img/img_1.png')}}" alt="perfumes picture" id="picture-main" />
                <h3 class="hero-title fw-bold mt-4">Luxury Fragrances for Every Moment</h3>
                <div class="title-underline my-3"></div>
                <p class="hero-subtitle text-muted">
                    Discover a world of refined scents crafted to express elegance, confidence, and individuality.
                    Our fragrances are designed to leave a lasting impression and elevate your everyday style.
                </p>
                <a href="{{ route('shop.index') }}" class="btn btn-dark btn-md mt-3 home-cta-btn">
                    Explore Collection
                </a>
            </div>
            <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 d-flex flex-column">
                <img src="{{asset('assets/img/picture-main-one.jpg')}}" alt="perfumes picture" id="picture-main" class="order-1 order-lg-2 d-block mx-auto mx-lg-0 mb-3" />
                <div class="order-2 order-lg-1">
                    <h3 class="hero-title fw-bold">Find Your Signature Scent</h3>
                    <div class="title-underline my-3"></div>
                    <p class="hero-subtitle text-muted">
                        Explore a curated collection of premium perfumes made with carefully selected ingredients.
                        From fresh and vibrant to deep and sensual notes, there is a perfect fragrance waiting for you.
                    </p>
                    <a href="{{ route('shop.index') }}" class="btn btn-dark btn-md mt-3 mb-3 home-cta-btn">
                        Explore Collection
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="heading d-flex align-items-center justify-content-left">
            <span>TOP SELLER PRODUCTS</span>
        </div>
        <div class="row">
            @foreach($perfumes as $p)
                <div class="col-6 col-lg-3 mb-4">
                    <div class="card h-100 border-0 card-item">
                        <div class="card-around">
                            <img src="{{ asset('assets/img/' . $p->picture) }}"
                                 class="card-img-top card-picture"
                                 alt="{{ $p->name }}" />

                            <div class="card-badge">
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $p->name }}</h5>
                            <p class="text-muted small">Eau de Parfum {{ $p->ml }}ml</p>

                            <div class="card-price mb-3 text-center">
                                @if($p->discount_price)
                                    <div class="old-price text-decoration-line-through text-muted">
                                        {{ $p->price }}€
                                    </div>
                                    <div class="new-price fw-bold">
                                        {{ $p->discount_price }}€
                                    </div>
                                @else
                                    <div class="new-price fw-bold">{{ $p->price }}€</div>
                                @endif
                            </div>

                            <div class="rating mb-2">
                                @for($i=1; $i<=5; $i++)
                                    @if($i <= $p->rating)
                                        <i class="fa-solid fa-star"></i>
                                    @else
                                        <i class="fa-regular fa-star"></i>
                                    @endif
                                @endfor
                                <span class="rating-number">({{ $p->rating }}.0)</span>
                            </div>

                            <div class="d-grid gap-2 card-button">
                                <button class="btn btn-dark add-to-cart" data-id="{{ $p->id }}">
                                    <i class="fa-solid fa-cart-shopping"></i> Add to cart
                                </button>
                                <button class="btn btn-outline-secondary btn-sm product-details-btn" data-id="{{ $p->id }}">
                                    Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container-fluid choose">
        <div class="heading d-flex align-items-center justify-content-left">
            <span>WHY CHOOSE US</span>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card-choose">
                    <div class="choose-icon">
                        <i class="fa-solid fa-certificate"></i>
                    </div>
                    <h4>Original Products</h4>
                    <p>Every fragrance in our collection is carefully selected to ensure authenticity and premium quality.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card-choose">
                    <div class="choose-icon">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <h4>Fast Delivery</h4>
                    <p>We prepare and dispatch orders quickly so your favorite perfume arrives without unnecessary waiting.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card-choose">
                    <div class="choose-icon">
                        <i class="fa-solid fa-shield-heart"></i>
                    </div>
                    <h4>Safe Shopping</h4>
                    <p>Enjoy a secure shopping experience with carefully managed products, clear pricing, and trusted service.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card-choose">
                    <div class="choose-icon">
                        <i class="fa-solid fa-gem"></i>
                    </div>
                    <h4>Curated Selection</h4>
                    <p>From timeless classics to modern signatures, our catalog is designed to match every taste and occasion.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="brand">
        <div class="heading d-flex align-items-center justify-content-left">
            <span>EXPLORE OUR BRANDS</span>
        </div>
        <div class="row text-center">
            @foreach($brands as $b)
                <div class="col-12 col-md-4 col-lg-2 mb-4 one">
                    <img src="{{ asset('assets/img/'.$b['picture']) }}" class="brand-logo img-fluid">
                </div>

            @endforeach
        </div>
    </div>
    <div class="container-fluid">
        <div class="heading d-flex align-items-center justify-content-left">
            <span>PRODUCTS ON SALE</span>
        </div>
            <div class="row">
                @foreach($onSale as $on)
                    <div class="col-6 col-lg-3 mb-4">
                        <div class="card h-100 border-0 card-item">
                            <div class="card-around">
                                <img src="{{ asset('assets/img/' . $on->picture) }}"
                                     class="card-img-top card-picture"
                                     alt="{{ $on->name }}" />

                                <div class="card-badge">
                                    <i class="fa-solid fa-percent"></i>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">{{ $on->name }}</h5>
                                <p class="text-muted small">Eau de Parfum {{ $on->ml }}ml</p>

                                <div class="card-price mb-3 text-center">
                                    @if($on->discount_price)
                                        <div class="old-price text-decoration-line-through text-muted">
                                            {{ $on->price }}€
                                        </div>
                                        <div class="new-price fw-bold">
                                            {{ $on->discount_price }}€
                                        </div>
                                    @else
                                        <div class="new-price fw-bold">{{ $on->price }}€</div>
                                    @endif
                                </div>

                                <div class="rating mb-2">
                                    @for($i=1; $i<=5; $i++)
                                        @if($i <= $on->rating)
                                            <i class="fa-solid fa-star"></i>
                                        @else
                                            <i class="fa-regular fa-star"></i>
                                        @endif
                                    @endfor
                                    <span class="rating-number">({{ $on->rating }}.0)</span>
                                </div>

                                <div class="d-grid gap-2 card-button">
                                    <button class="btn btn-dark add-to-cart" data-id="{{ $on->id }}">
                                        <i class="fa-solid fa-cart-shopping"></i> Add to cart
                                    </button>
                                    <button class="btn btn-outline-secondary btn-sm product-details-btn" data-id="{{ $on->id }}">
                                        Details
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection
