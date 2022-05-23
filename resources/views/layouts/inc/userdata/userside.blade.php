    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-1 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Outlet's</span>
        </a>
        <ul class="nav nav-pills flex-column mt-0 mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="{{ url('myprofile/' . Auth::user()->id) }}" class="nav-link align-middle px-0 pl-5"><img class="rounded-circle mt-1"
                        src="{{ asset('assets/uploads/users/' . Auth::user()->image) }}" width="40" height="40"> <span
                        class="ms-1 d-none d-sm-inline">
                        Hello,{{ Auth::user()->name }}</span>
                </a>
            </li>
            <li>
                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="fa-solid fa-list"></i> <span class="ms-1 d-none d-sm-inline">User Menu</span>
                </a>
                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="{{ url('user') }}" class="nav-link px-0"> <span
                                class="d-none d-sm-inline">Dashboard</span></a>
                    </li>
                    <li class="w-100">
                        <a href="{{ url('myprofile/' . Auth::user()->id) }}" class="nav-link px-0"> <span
                                class="d-none d-sm-inline">Profile</span></a>
                    </li>
                    <li>
                        <a href="{{ url('cart2') }}" class="nav-link px-0">
                            <span class="d-none d-sm-inline">My Cart</span>
                            <span class="badge badge-pill bg-success cart-count">0</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('wishlist2') }}" class="nav-link px-0">
                            <span class="d-none d-sm-inline">Wishlist</span>
                            <span class="badge badge-pill bg-primary wishlist-count">0</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ url('my-orders2') }}" class="nav-link px-0 align-middle">
                    <i class="fa-solid fa-table"></i> <span class="ms-1 d-none d-sm-inline">Orders</span></a>
            </li>
            <li>
                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                    <i class="fa-solid fa-toolbox"></i> <span class="ms-1 d-none d-sm-inline">Repairs</span></a>
                <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="{{ url('userepair/'.Auth::user()->id) }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2</a>
                    </li>
                </ul>
            </li>
            {{-- <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-grid"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>
                            </li>
                        </ul>
                    </li> --}}
            {{-- <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
                    </li> --}}
        </ul>
        <hr>
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="{{ url('myprofile/' . Auth::user()->id) }}">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Sign out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
