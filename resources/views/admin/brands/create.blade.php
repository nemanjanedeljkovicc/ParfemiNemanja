@extends('layouts.admin')
@section('title')
    Add new Brand
@endsection
@section('content')
    <h2>Add Brand</h2>

    <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label>Picture</label>
            <input type="file" name="picture" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
