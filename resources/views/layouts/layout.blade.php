<!DOCTYPE html>
<html>

@include('fixed.head')
<body data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">

@include('fixed.topbar')
@include('fixed.navigation')

@yield('content')

<div class="modal fade" id="product-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Product Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="product-details-content">
                <div class="text-center py-4">Loading...</div>
            </div>
        </div>
    </div>
</div>

@include('fixed.script')
@yield('scripts')

@include('fixed.footer')
</body>
</html>
