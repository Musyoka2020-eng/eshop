<nav class="navbar navbar-expand-lg navbar-dark bg-secondary sticky-top pt-0">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Outlet's Electronic</a>

        <div class="search-bar mb-0 mt-2">
            <form action="{{url('searchproduct')}}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="search" class="form-control" name="product_name" id="search_product" placeholder="Search products"
                 aria-describedby="basic-addon1">
                    <button type="submit" class="input-group-text"><i class="fa-solid fa-search"></i></button>
                </div>
            </form>
        </div>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('category')}}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('wishlist')}}">Wishlist
                        <span class="badge badge-pill bg-primary wishlist-count">0</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('cart')}}">Cart
                        <span class="badge badge-pill bg-success cart-count">0</span>
                    </a>
                </li>


            </ul>
            @if (Route::has('login'))
            <div class="ms-4 navbar-nav">
                @auth
                <li class="nav-item">
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa-solid fa-circle-user fa-xl"></i>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{url('my-orders')}}"> <span><i class="fa-solid fa-list"></i></span>  My Orders</a>
                                <a class="dropdown-item" href="{{url('user')}}"><span><i class="fa-solid fa-dashboard"></i></span>  Dashboard </a>
                                {{-- <a class="dropdown-item" href="{{url('change-password')}}"><span><i class="fa-solid fa-key"></i></span>  password </a> --}}
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();"><span><i class="fa-solid fa-sign-out"></i></span>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </li>

                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </li>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </div>
</nav>
