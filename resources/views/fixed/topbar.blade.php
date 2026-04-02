<div class="bg-dark border-bottom py-2 small">
    <div class="container">
        <div class="row text-center text-lg-start">
            @foreach($topbars as $item)
                <div class="col-lg-3 col-md-6 mb-1 mb-lg-0 text-light">
                    <i class="{{ $item->icon }}"></i>
                    {{ $item->name }}
                </div>
            @endforeach
        </div>
    </div>
</div>
