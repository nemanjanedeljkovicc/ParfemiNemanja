$(document).ready(function () {
    const cartPage = $('.cart-page');

    if (!cartPage.length) {
        return;
    }

    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    const updateUrl = cartPage.data('update-url');
    const removeUrl = cartPage.data('remove-url');

    function sendQuantityUpdate(row, quantity) {
        return $.post(updateUrl, {
            id: row.data('id'),
            quantity: quantity,
            _token: csrfToken
        });
    }

    function updateGrandTotal() {
        let grand = 0;

        $('tr[data-id]').each(function () {
            let total = parseFloat($(this).find('.total').text()) || 0;
            grand += total;
        });

        $('#grand-total').text(grand.toFixed(2));
    }

    function updateTotal(row, quantity) {
        let price = parseFloat(row.find('.price').text()) || 0;
        let total = price * quantity;
        row.find('.total').text(total.toFixed(2));
        updateGrandTotal();
    }

    function updateCartCount(count) {
        $('#cart-count').text(count ?? 0);
    }

    updateGrandTotal();

    $('.increase').on('click', function () {
        let row = $(this).closest('tr');
        let input = row.find('.quantity');
        let quantity = (parseInt(input.val(), 10) || 0) + 1;
        input.val(quantity);

        sendQuantityUpdate(row, quantity).done(function (res) {
            if (res.success) {
                row.find('.total').text((parseFloat(res.total) || 0).toFixed(2));
                updateGrandTotal();
                input.attr('value', quantity);
                updateCartCount(res.cart_count);
            } else {
                alert('Could not update quantity!');
            }
        }).fail(function () {
            alert('Could not update quantity!');
        });
    });

    $('.decrease').on('click', function () {
        let row = $(this).closest('tr');
        let input = row.find('.quantity');
        let currentQuantity = parseInt(input.val(), 10) || 1;
        let quantity = currentQuantity - 1;

        if (quantity < 1) {
            return;
        }

        input.val(quantity);

        sendQuantityUpdate(row, quantity).done(function (res) {
            if (res.success) {
                row.find('.total').text((parseFloat(res.total) || 0).toFixed(2));
                updateGrandTotal();
                input.attr('value', quantity);
                updateCartCount(res.cart_count);
            } else {
                input.val(currentQuantity);
                alert('Could not update quantity!');
            }
        }).fail(function () {
            input.val(currentQuantity);
            alert('Could not update quantity!');
        });
    });

    $('.quantity').on('change', function () {
        let row = $(this).closest('tr');
        let input = $(this);
        let previousQuantity = parseInt(input.attr('value'), 10) || 1;
        let quantity = parseInt(input.val(), 10) || 1;

        if (quantity < 1) {
            quantity = 1;
        }

        input.val(quantity);

        sendQuantityUpdate(row, quantity).done(function (res) {
            if (res.success) {
                row.find('.total').text((parseFloat(res.total) || 0).toFixed(2));
                updateGrandTotal();
                input.attr('value', quantity);
                updateCartCount(res.cart_count);
            } else {
                input.val(previousQuantity);
                alert('Could not update quantity!');
            }
        }).fail(function () {
            input.val(previousQuantity);
            alert('Could not update quantity!');
        });
    });

    $('.remove').on('click', function () {
        let row = $(this).closest('tr');

        $.post(removeUrl, {
            id: row.data('id'),
            _token: csrfToken
        }, function (res) {
            if (res.success) {
                row.remove();
                updateGrandTotal();
                updateCartCount(res.cart_count);
            } else {
                alert('Could not remove item!');
            }
        }).fail(function () {
            alert('Could not remove item!');
        });
    });
});
