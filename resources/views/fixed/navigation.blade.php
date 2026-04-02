<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{route('home')}}">
            <img src="{{asset('assets/img/logo.png')}}"  class="me-2">
            <span class="fw-bold fs-5">Avenue & Lecarte</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                @foreach($menus as $m)
                    <li class="nav-item">
                        <a class="nav-link px-3 fw-semibold" href="{{ route($m->url) }}">
                            {{ $m->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <ul class="navbar-nav align-items-center">
                <li class="nav-item me-3">
                    <a class="nav-link position-relative" href="{{route("cart.index")}}">
                        <i class="fa-solid fa-bag-shopping fs-5"></i>

                        <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ auth()->user() ? auth()->user()->cartItems->sum('quantity') : 0 }}
                        </span>
                    </a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="btn btn-dark ml-3 nav-action-btn" href="{{route('login')}}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-dark m-2 nav-action-btn" href="{{route('auth.register')}}">Register</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item me-2 ml-2">
        <span class="nav-link fw-semibold">
            <i class="fa fa-user"></i> {{ auth()->user()->name }}
        </span>
                    </li>

                    @if(auth()->user()->role && auth()->user()->role->name === 'admin')
                        <li class="nav-item me-2 mr-2">
                            <a class="btn btn-dark btn-sm nav-action-btn" href="{{ route('admin.dashboard') }}">
                                Admin Panel
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-outline-danger btn-sm nav-action-btn">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
