@php
    $imagePath = $perfume->picture && file_exists(storage_path('app/public/' . $perfume->picture))
        ? asset('storage/' . $perfume->picture)
        : asset('assets/img/' . $perfume->picture);
@endphp

<div class="details-card">
    <div class="row align-items-center">
        <div class="col-md-5 mb-4 mb-md-0">
            <div class="details-image-wrap text-center">
                <img src="{{ $imagePath }}" alt="{{ $perfume->name }}" class="img-fluid details-image">
            </div>
        </div>

        <div class="col-md-7">
            <div class="details-eyebrow">{{ $perfume->brand->name ?? 'Unknown Brand' }}</div>
            <h3 class="details-title">{{ $perfume->name }}</h3>

            <div class="details-grid">
                <div class="details-item">
                    <span class="details-label">Size</span>
                    <span class="details-value">{{ $perfume->ml }} ml</span>
                </div>
                <div class="details-item">
                    <span class="details-label">Rating</span>
                    <span class="details-value">{{ $perfume->rating }}/5</span>
                </div>
            </div>

            <div class="details-tags">
                @forelse($perfume->categories as $category)
                    <span class="details-tag">{{ $category->name }}</span>
                @empty
                    <span class="details-tag">No category</span>
                @endforelse
            </div>

            <div class="details-price-box">
                @if($perfume->discount_price)
                    <div class="details-old-price">{{ $perfume->price }} EUR</div>
                    <div class="details-new-price">{{ $perfume->discount_price }} EUR</div>
                @else
                    <div class="details-new-price">{{ $perfume->price }} EUR</div>
                @endif
            </div>

            <p class="details-description">
                A refined fragrance choice with a distinctive signature, balanced character, and premium presentation.
            </p>

            <div class="d-grid gap-2 mt-4">
                <button class="btn btn-dark details-cart-btn add-to-cart" data-id="{{ $perfume->id }}">
                    <i class="fa-solid fa-cart-shopping"></i> Add to cart
                </button>
            </div>
        </div>
    </div>
</div>
