@extends('layouts.admin')

@section('title')
    All Orders
@endsection

@section('content')
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>All Orders</h2>
        </div>

        <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Total</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td data-label="ID">{{ $order->id }}</td>
                    <td data-label="Customer">{{ $order->name }} {{ $order->surname }}</td>
                    <td data-label="Email">{{ $order->email }}</td>
                    <td data-label="Phone">{{ $order->phone }}</td>
                    <td data-label="Total">{{ number_format($order->total_price, 2) }} EUR</td>
                    <td data-label="Status">{{ ucfirst($order->status) }}</td>
                    <td data-label="Created At">{{ $order->created_at?->format('d.m.Y H:i') }}</td>
                    <td data-label="Actions">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">Details</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">There are no orders yet.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        </div>
    </div>
@endsection
