@extends('layouts.admin')
@section('title')
    Edit category
@endsection
@section('content')
    <h2>Edit Category</h2>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

