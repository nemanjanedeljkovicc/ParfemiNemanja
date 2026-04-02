@extends('layouts.admin')
@section('title')
    Edit Brand
@endsection
@section('content')
    <h2>Edit Brand</h2>

    <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $brand->name) }}">
        </div>

        <div class="mb-3">
            <label>Current Picture</label><br>
            @php
                $imagePath = $brand->picture && file_exists(storage_path('app/public/' . $brand->picture))
   ? asset('storage/' . $brand->picture)
   : asset('assets/img/' . $brand->picture);
            @endphp
            <img src="{{ $imagePath }}" width="120">
        </div>

        <div class="mb-3">
            <label>Change Picture</label>
            <input type="file" name="picture" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
