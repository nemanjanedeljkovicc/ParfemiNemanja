@extends('layouts.layout')

@section('description')
    Browse our collection of original perfumes and luxury fragrances, and find the perfect scent by brand, category, size, and price.
@endsection

@section('keywords')
    perfume shop, original perfumes, luxury fragrances, buy perfumes online, branded perfumes, men's perfumes, women's perfumes
@endsection

@section('title')
    Shop
@endsection

@section('content')
    <div class="container-fluid mt-5 shop-page">
        <div class="row">
            <div class="col-lg-3 col-md-4 mb-4">
                <form method="GET" action="{{ route('shop.index') }}" id="shop-filter-form">
                    <div class="card p-4 shadow-sm shop-filter-card">
                        <div class="shop-filter-header">
                            <span class="shop-filter-badge">Discover</span>
                            <h4>Refine Your Search</h4>
                            <p>Browse fragrances by category, brand, size, and price.</p>
                        </div>

                        <div class="shop-filter-group">
                            <h5>Search</h5>
                        </div>
                        <input
                            type="text"
                            id="shop-search"
                            name="search"
                            class="form-control mb-3 shop-filter-input"
                            placeholder="Search perfumes..."
                            value="{{ request('search') }}"
                        >

                        <div class="shop-filter-divider"></div>

                        <div class="shop-filter-group">
                            <h5>Categories</h5>
                            @foreach($categories as $category)
                                <label class="shop-check">
                                    <input type="checkbox" name="category[]" value="{{ $category->id }}"
                                        {{ (is_array(request('category')) && in_array($category->id, request('category'))) ? 'checked' : '' }}>
                                    <span>{{ $category->name }}</span>
                                </label>
                            @endforeach
                        </div>

                        <div class="shop-filter-divider"></div>

                        <div class="shop-filter-group">
                            <h5>Brands</h5>
                            @foreach($brands as $brand)
                                <label class="shop-check">
                                    <input type="checkbox" name="brand[]" value="{{ $brand->id }}"
                                        {{ (is_array(request('brand')) && in_array($brand->id, request('brand'))) ? 'checked' : '' }}>
                                    <span>{{ $brand->name }}</span>
                                </label>
                            @endforeach
                        </div>

                        <div class="shop-filter-divider"></div>

                        <div class="shop-filter-group">
                            <h5>Size (ml)</h5>
                            @foreach([30,50,100] as $ml)
                                <label class="shop-check">
                                    <input type="checkbox" name="ml[]" value="{{ $ml }}"
                                        {{ (is_array(request('ml')) && in_array($ml, request('ml'))) ? 'checked' : '' }}>
                                    <span>{{ $ml }} ml</span>
                                </label>
                            @endforeach
                        </div>

                        <div class="shop-filter-divider"></div>

                        <div class="shop-filter-group">
                            <h5>Price Range</h5>
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" name="price_min" placeholder="Min" value="{{ request('price_min') }}" class="form-control shop-filter-input">
                                </div>
                                <div class="col-6">
                                    <input type="number" name="price_max" placeholder="Max" value="{{ request('price_max') }}" class="form-control shop-filter-input">
                                </div>
                            </div>
                        </div>

                        <div class="shop-filter-divider"></div>

                        <div class="shop-filter-group">
                            <h5>Sort By</h5>
                            <select name="sort" class="form-control shop-filter-input">
                                <option value="">Choose an option</option>
                                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name: A to Z</option>
                                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name: Z to A</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                            </select>
                        </div>

                        <div class="shop-filter-actions">
                            <button type="submit" class="btn btn-dark">Apply Filters</button>
                            <a href="{{ route('shop.index') }}" class="btn btn-outline-secondary">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-9 col-md-8">
                <div id="shop-results">
                    @include('pages.shop.partials.products', ['perfumes' => $perfumes])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/shop.js') }}"></script>
@endsection
