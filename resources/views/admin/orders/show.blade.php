@extends('layouts.admin')

@section('title')
    Order Details
@endsection

@section('content')
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Order #{{ $order->id }}</h2>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back</a>
        </div>

        <div class="row">
            <div class="col-lg-5 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h4 class="mb-3">Customer Information</h4>
                        <p><strong>Name:</strong> {{ $order->name }} {{ $order->surname }}</p>
                        <p><strong>Email:</strong> {{ $order->email }}</p>
                        <p><strong>Phone:</strong> {{ $order->phone }}</p>
                        <p><strong>Address:</strong> {{ $order->address }}</p>
                        <p><strong>City:</strong> {{ $order->city }}</p>
                        <p><strong>Postal Code:</strong> {{ $order->postal_code }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                        <p><strong>Created At:</strong> {{ $order->created_at?->format('d.m.Y H:i') }}</p>
                        <p class="mb-0"><strong>Note:</strong> {{ $order->note ?: '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h4 class="mb-3">Ordered Products</h4>

                        <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0">
                            <thead class="table-dark">
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td data-label="Product">{{ $item->perfume->name ?? 'Deleted Product' }}</td>
                                    <td data-label="Price">{{ number_format($item->price, 2) }} EUR</td>
                                    <td data-label="Quantity">{{ $item->quantity }}</td>
                                    <td data-label="Total">{{ number_format($item->price * $item->quantity, 2) }} EUR</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Grand Total</th>
                                <th>{{ number_format($order->total_price, 2) }} EUR</th>
                            </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
