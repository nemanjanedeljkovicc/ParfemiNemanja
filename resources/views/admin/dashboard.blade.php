@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('content')

    <h2 class="mb-4">Dashboard</h2>

    <div class="row">

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Total Products</h5>
                <h3>{{ \App\Models\Perfume::count() }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Total Brands</h5>
                <h3>{{ \App\Models\Brand::count() }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Total Users</h5>
                <h3>{{ \App\Models\User::count() }}</h3>
            </div>
        </div>


    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Total Categories</h5>
                <h3>{{ \App\Models\Category::count() }}</h3>
            </div>
        </div>
    </div>
@endsection
