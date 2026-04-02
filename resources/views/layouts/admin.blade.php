<!DOCTYPE html>
<html lang="en">
@include('fixed.head')
<body>
<div class="sidebar">
    <h4 class="text-center py-3">Admin Panel</h4>
    <a href="{{ route('admin.dashboard') }}">
        <i class="fa fa-home"></i> Dashboard
    </a>
    <a href="{{ route('admin.products.index') }}">
        <i class="fa fa-box"></i> Products
    </a>
    <a href="{{ route('admin.brands.index') }}">
        <i class="fa fa-tags"></i> Brands
    </a>
    <a href="{{ route('admin.categories.index') }}">
        <i class="fa fa-th-large"></i> Categories
    </a>
    <a href="{{ route('admin.orders.index') }}">
        <i class="fa fa-shopping-bag"></i> Orders
    </a>
    <a href="{{ route('admin.logs') }}">
        <i class="fa fa-list"></i> Logs
    </a>
    <hr>
    <a href="{{ route('home') }}">
        <i class="fa fa-arrow-left"></i> Back to site
    </a>
</div>
<div class="content">
    @yield('content')
</div>
</body>
</html>
