@extends('layouts.admin')
@section('title')
    Brands
@endsection
@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Brands</h2>
            <a href="{{ route('admin.brands.create') }}" class="btn btn-success">Add New Brand</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Picture</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($brands as $brand)
                <tr>
                    <td data-label="ID">{{ $brand->id }}</td>
                    <td data-label="Picture">
                        @php
                            $imagePath = $brand->picture && file_exists(storage_path('app/public/' . $brand->picture))
               ? asset('storage/' . $brand->picture)
               : asset('assets/img/' . $brand->picture);
                        @endphp
                        @if($brand->picture)
                            <img src="{{ $imagePath}}" alt="{{ $brand->name }}" width="60">
                        @endif
                    </td>
                    <td data-label="Name">{{ $brand->name }}</td>
                    <td data-label="Actions">
                        <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No brands found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        </div>
    </div>
@endsection
