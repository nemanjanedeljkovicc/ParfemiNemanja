@extends('layouts.layout')

@section('title', 'Checkout')

@section('content')
    <div class="container my-5 checkout-wrapper">
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm checkout-left">
                    <div class="card-body p-4">
                        <h2 class="mb-4">Checkout</h2>

                        <form action="{{ route('checkout.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="surname" class="form-control" value="{{ old('surname', auth()->user()->surname) }}">
                                    @error('surname')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone', auth()->user()->phone) }}">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                                    @error('city')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Postal Code</label>
                                    <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code') }}">
                                    @error('postal_code')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Note</label>
                                <textarea name="note" rows="4" class="form-control">{{ old('note') }}</textarea>
                                @error('note')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-dark">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card border-0 shadow-sm checkout-right">
                    <div class="card-body p-4">
                        <h3 class="mb-4">Order Summary</h3>

                        @foreach($items as $item)
                            @php
                                $price = $item->perfume?->discount_price ?? $item->perfume?->price ?? 0;
                                $lineTotal = $price * $item->quantity;
                            @endphp
                            <div class="d-flex justify-content-between align-items-center border-bottom py-3 checkout-product">
                                <div>
                                    <div class="fw-bold">{{ $item->perfume->name ?? 'Deleted Product' }}</div>
                                    <small class="text-muted">Quantity: {{ $item->quantity }}</small>
                                </div>
                                <div class="fw-bold">{{ number_format($lineTotal, 2) }} EUR</div>
                            </div>
                        @endforeach

                        <div class="d-flex justify-content-between align-items-center pt-4 checkout-total">
                            <span class="fw-bold">Grand Total</span>
                            <span class="fw-bold">{{ number_format($grandTotal, 2) }} EUR</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
