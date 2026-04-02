<footer class="bg-dark text-light pt-5 pb-4 mt-5">
    <div class="container text-md-left">

        <div class="row">
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                <h5 class="text-uppercase fw-bold mb-4">Perfume Shop</h5>
                <p>
                    Online store of luxury perfumes for men and women.
                    We offer original fragrances from famous global brands
                    at the best prices.
                </p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold mb-4">Links</h6>
                <p><a href="{{ route('home') }}" class="text-light text-decoration-none">Home</a></p>
                <p><a href="{{ route('shop.index') }}" class="text-light text-decoration-none">Shop</a></p>
                <p><a href="{{ route('contact') }}" class="text-light text-decoration-none">Contact</a></p>
                <p><a href="{{ route('author.index') }}" class="text-light text-decoration-none">Author</a></p>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold mb-4">SECURE ONLINE PAYMENT</h6>
                <p><i class="fa-brands fa-cc-mastercard"></i> MASTERCARD</p>
                <p><i class="fa-brands fa-cc-paypal"></i> PayPal</p>
                <p><i class="fa-brands fa-cc-visa"></i> VISA</p>
                <p><i class="fa-solid fa-credit-card"></i> DINACARD</p>
            </div>
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                <p><i class="bi bi-geo-alt-fill me-2"></i> Belgrade, Serbia</p>
                <p><i class="bi bi-envelope-fill me-2"></i> avenue@gmail.com</p>
                <p><i class="bi bi-telephone-fill me-2"></i> +381 61 123 456</p>
                <p><i class="bi bi-clock-fill me-2"></i> Mon - Sat: 09:00 - 21:00</p>
            </div>
        </div>

        <hr class="mb-4">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-8">
                <p class="mb-0">
                    © 2026 Perfume Shop. All rights reserved.
                </p>
            </div>
            <div class="col-md-5 col-lg-4 text-md-end">
                <a href="https://www.facebook.com/" class="btn btn-outline-light btn-floating m-1">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="https://www.instagram.com/" class="btn btn-outline-light btn-floating m-1">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://x.com/" class="btn btn-outline-light btn-floating m-1">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="{{asset("sitemap.xml")}}" class="btn btn-outline-light btn-floating m-1">
                    <i class="fa-solid fa-sitemap"></i>
                </a>
                <a href="{{asset("rss.xml")}}" class="btn btn-outline-light btn-floating m-1">
                    <i class="fa-solid fa-rss"></i>
                </a>
                <a href="{{asset("documentation.pdf")}}" class="btn btn-outline-light btn-floating m-1">
                    <i class="fa-solid fa-file"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
