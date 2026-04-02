@extends('layouts.admin')
@section('title')
    Add category
@endsection
@section('content')
    <h2>Add Category</h2>

    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
