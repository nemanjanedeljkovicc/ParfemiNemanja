@extends('layouts.layout')

@section('title', 'Your Cart')

@section('content')
    <div
        class="container mt-5 cart-page cart-section"
        data-update-url="{{ route('cart.update') }}"
        data-remove-url="{{ route('cart.remove') }}"
    >
        <div class="cart-box">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <h2>Your Shopping Cart</h2>
        <table class="table table-bordered mt-4">
            <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price (EUR)</th>
                <th>Quantity</th>
                <th>Total (EUR)</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                @php
                    $imagePath = ($item->perfume && $item->perfume->picture && file_exists(storage_path('app/public/' . $item->perfume->picture)))
                        ? asset('storage/' . $item->perfume->picture)
                        : asset('assets/img/' . ($item->perfume->picture ?? 'no-image.png'));
                    $price = $item->perfume->discount_price ?? $item->perfume->price ?? 0;
                @endphp
                <tr data-id="{{ $item->id }}">
                    <td class="text-center align-middle">
                        <img src="{{ $imagePath }}" alt="{{ $item->perfume->name ?? 'Deleted Product' }}" class="cart-picture">
                    </td>
                    <td>{{ $item->perfume->name ?? 'Deleted Product' }}</td>
                    <td class="price">{{ $price }}</td>
                    <td>
                        <div class="cart-quantity">
                            <button class="btn btn-sm btn-outline-secondary decrease">-</button>
                            <input type="number" min="1" class="quantity text-center" value="{{ $item->quantity }}">
                            <button class="btn btn-sm btn-outline-secondary increase">+</button>
                        </div>
                    </td>
                    <td class="total">{{ $price * $item->quantity }}</td>
                    <td>
                        <button class="btn btn-sm btn-danger remove">Remove</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th colspan="4" class="text-end">Grand Total:</th>
                <th id="grand-total" class="cart-total">0.00</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
        @if($items->count())
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('checkout.index') }}" class="btn btn-dark">Proceed to Checkout</a>
            </div>
        @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/cart.js') }}"></script>
@endsection
