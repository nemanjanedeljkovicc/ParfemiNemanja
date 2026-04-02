@extends('layouts.admin')

@section('title')
    All products
@endsection

@section('content')
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>All Products</h2>
            <a href="{{ route('admin.products.create') }}" class="btn btn-success">Add New Product</a>
        </div>

        <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Categories</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Rating</th>
                <th>Top Seller</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($perfumes as $p)
                <tr>
                    <td data-label="ID">{{ $p->id }}</td>
                    <td data-label="Name">{{ $p->name }}</td>
                    <td data-label="Brand">{{ $p->brand->name ?? '-' }}</td>
                    <td data-label="Categories">
                        @foreach($p->categories as $c)
                            <span>{{ $c->name }}</span>
                        @endforeach
                    </td>
                    <td data-label="Price">${{ $p->price }}</td>
                    <td data-label="Discount">{{ $p->discount_price ? '$'.$p->discount_price : '-' }}</td>
                    <td data-label="Rating">{{ $p->rating }}</td>
                    <td data-label="Top Seller">{{ $p->top_sell ? 'Yes' : 'No' }}</td>
                    <td data-label="Actions">
                        <a href="{{ route('admin.products.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.products.destroy', $p->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
