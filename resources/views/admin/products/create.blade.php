@extends('layouts.admin')
@section('title')
    Add Product
@endsection

@section('content')
    <div class="container">
        <h2>Add Product</h2>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Brand</label>
                <select name="brand_id" class="form-control">
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select name="rating" id="rating" class="form-select">
                    @for($i = 0; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('rating', $product->rating ?? 0) == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label>Categories</label><br>

                @foreach($categories as $category)
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                    {{ $category->name }} <br>
                @endforeach
            </div>
            <div class="mb-3">
                <label>Price</label>
                <input type="number" step="0.01" name="price" class="form-control">
            </div>

            <div class="mb-3">
                <label>Discount Price</label>
                <input type="number" step="0.01" name="discount_price" class="form-control">
            </div>

            <div class="mb-3">
                <label>ML</label>
                <input type="text" name="ml" class="form-control">
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="picture" class="form-control">
            </div>
            <button class="btn btn-success">Add Product</button>
        </form>
    </div>
@endsection
