<div class="row">
    @forelse($perfumes as $p)
        <div class="col-6 col-lg-4 mb-4">
            <div class="card h-100 border-0 card-item">
                @php
                    $imagePath = $p->picture && file_exists(storage_path('app/public/' . $p->picture))
                        ? asset('storage/' . $p->picture)
                        : asset('assets/img/' . $p->picture);
                @endphp
                <div class="card-around">
                    <img src="{{ $imagePath }}" class="card-img-top card-picture" alt="{{ $p->name }}" />
                    @if($p->discount_price)
                        <div class="card-badge">
                            <i class="fa-solid fa-percent"></i>
                        </div>
                    @endif
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">{{ $p->name }}</h5>
                    <p class="text-muted small">Eau de Parfum {{ $p->ml }}ml</p>

                    <div class="card-price mb-3 text-center">
                        @if($p->discount_price)
                            <div class="old-price text-decoration-line-through text-muted">
                                {{ $p->price }} EUR
                            </div>
                            <div class="new-price fw-bold">
                                {{ $p->discount_price }} EUR
                            </div>
                        @else
                            <div class="new-price fw-bold">{{ $p->price }} EUR</div>
                        @endif
                    </div>

                    <div class="rating mb-2">
                        @for($i = 1; $i <= 5; $i++)
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
    @empty
        <div class="col-12">
            <p>There are no perfumes for the selected filters</p>
        </div>
    @endforelse
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $perfumes->links() }}
</div>
