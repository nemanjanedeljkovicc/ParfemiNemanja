$(document).ready(function () {
    $(document).on('click', '.add-to-cart', function () {
        const isAuthenticated = $('body').data('authenticated') === true || $('body').data('authenticated') === 'true';

        if (!isAuthenticated) {
            alert('You must be logged in to add a product to the cart.');
            return;
        }

        let productId = $(this).data('id');

        $.ajax({
            url: '/cart/add',
            method: 'POST',
            data: {
                product_id: productId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                let countElem = $('#cart-count');
                countElem.text(response.cart_count ?? 0);
            },
            error: function () {
                alert('Something went wrong!');
            }
        });
    });

    $(document).on('click', '.product-details-btn', function () {
        let productId = $(this).data('id');
        let modalBody = $('#product-details-content');

        modalBody.html('<div class="text-center py-4">Loading...</div>');
        $('#product-modal').modal('show');

        $.ajax({
            url: '/shop/details/' + productId,
            method: 'GET',
            success: function (response) {
                modalBody.html(response);
            },
            error: function () {
                modalBody.html('<div class="alert alert-danger mb-0">Product details are currently unavailable.</div>');
            }
        });
    });
});
