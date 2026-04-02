@extends('layouts.admin')

@section('title')
    Edit Product
@endsection

@section('content')
    <div class="container">
        <h2>Edit Product</h2>

        <form action="{{ route('admin.products.update',$product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name', $product->name) }}">
            </div>

            <div class="mb-3">
                <label>Brand</label>
                <select name="brand_id" class="form-control">
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}"
                                @if($product->brand_id == $brand->id) selected @endif>
                            {{ $brand->name }}
                        </option>
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
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                           @if($product->categories->contains($category->id)) checked @endif>
                    {{ $category->name }}
                    <br>
                @endforeach
            </div>

            <div class="mb-3">
                <label>Price</label>
                <input type="number" step="0.01" name="price" class="form-control"
                       value="{{ old('price', $product->price) }}">
            </div>

            <div class="mb-3">
                <label>Discount Price</label>
                <input type="number" step="0.01" name="discount_price" class="form-control"
                       value="{{ old('discount_price', $product->discount_price) }}">
            </div>
            <div class="mb-3">
                <label>ML</label>
                <input type="text" name="ml" class="form-control"
                       value="{{ old('ml', $product->ml) }}">
            </div>
            @php
            $imagePath = $product->picture && file_exists(storage_path('app/public/' . $product->picture))
            ? asset('storage/' . $product->picture)
            : asset('assets/img/' . $product->picture);
            @endphp
            <div class="mb-3">
                <label>Current Image</label><br>
                <img src="{{ $imagePath }}" width="100">
            </div>

            <div class="mb-3">
                <label>Change Image</label>
                <input type="file" name="picture" class="form-control">
            </div>

            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
