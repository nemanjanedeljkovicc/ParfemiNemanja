$(document).ready(function () {
    const form = $('#shop-filter-form');
    const results = $('#shop-results');

    if (!form.length || !results.length) {
        return;
    }

    let searchTimer = null;

    function updateBrowserUrl(baseUrl, queryString) {
        if (window.history && window.history.replaceState) {
            const separator = baseUrl.includes('?') ? '&' : '?';
            const finalUrl = queryString ? baseUrl + separator + queryString : baseUrl;
            window.history.replaceState({}, '', finalUrl);
        }
    }

    function bindPagination() {
        results.find('.pagination a').off('click').on('click', function (e) {
            e.preventDefault();
            loadResults($(this).attr('href'));
        });
    }

    function loadResults(url) {
        const targetUrl = new URL(url || form.attr('action'), window.location.origin);
        const queryParams = new URLSearchParams(form.serialize());
        const page = targetUrl.searchParams.get('page');

        if (page) {
            queryParams.set('page', page);
        } else {
            queryParams.delete('page');
        }

        $.ajax({
            url: targetUrl.origin + targetUrl.pathname,
            method: 'GET',
            data: queryParams.toString(),
            success: function (response) {
                results.html(response);
                bindPagination();
                updateBrowserUrl(targetUrl.origin + targetUrl.pathname, queryParams.toString());
            },
            error: function () {
                alert('Filtering is currently unavailable.');
            }
        });
    }

    form.on('submit', function (e) {
        e.preventDefault();
        loadResults();
    });

    form.find('input[type="checkbox"], select').on('change', function () {
        loadResults();
    });

    form.find('input[name="price_min"], input[name="price_max"]').on('change', function () {
        loadResults();
    });

    $('#shop-search').on('input', function () {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(function () {
            loadResults();
        }, 400);
    });

    bindPagination();
});
