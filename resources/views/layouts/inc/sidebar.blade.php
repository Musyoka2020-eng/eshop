<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#AbleGod">
            <img src="#" class="navbar-brand-img h-100">
            {{-- alt="main_logo" --}}
            <span class="ms-1 font-weight-bold text-white">Outlet</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('dashboard') ? 'active bg-gradient-primary' : '' }} "
                    href="{{ url('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('users') ? 'active bg-gradient-primary' : '' }}  "
                    href="{{ url('users') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>
            <button data-bs-target="#submenu1" data-bs-toggle="collapse" aria-expanded="false"
                class="btn btn-toggle text-white d-flex align-items-center collapsed">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">receipt_long</i>
                </div>
                <span class="nav-link-text ms-1">Categories</span>
            </button>
            <div class="collapse" id="submenu1" style="">
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('categories') ? 'active bg-gradient-primary' : '' }} "
                        href="{{ url('categories') }} ">
                        <span class="nav-link-text ms-1">Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('add-category') ? 'active bg-gradient-primary' : '' }}  "
                        href="{{ url('add-category') }}">
                        <span class="nav-link-text ms-1">Add Category</span>
                    </a>
                </li>
            </div>
            <button data-bs-target="#submenu2" data-bs-toggle="collapse" aria-expanded="false"
                class="btn btn-toggle text-white d-flex align-items-center collapsed">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">receipt_long</i>
                </div>
                <span class="nav-link-text ms-1">Products</span>
            </button>
            <div class="collapse" id="submenu2" style="">
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('products') ? 'active bg-gradient-primary' : '' }} "
                        href="{{ url('products') }} ">
                        <span class="nav-link-text ms-1">Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('add-products') ? 'active bg-gradient-primary' : '' }}  "
                        href="{{ url('add-products') }}">
                        <span class="nav-link-text ms-1">Add Products</span>
                    </a>
                </li>
            </div>
            <button data-bs-target="#submenu3" data-bs-toggle="collapse" aria-expanded="false"
                class="btn btn-toggle text-white d-flex align-items-center collapsed">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">person</i>
                </div>
                <span class="nav-link-text ms-1">Services</span>
            </button>
            <div class="collapse" id="submenu3" style="">
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('service') ? 'active bg-gradient-primary' : '' }}  "
                        href="{{ url('service') }}">
                        <span class="nav-link-text ms-1">Services</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('add-service') ? 'active bg-gradient-primary' : '' }}  "
                        href="{{ url('add-service') }}">
                        <span class="nav-link-text ms-1">Add Services</span>
                    </a>
                </li>
            </div>
            <button data-bs-target="#submenu4" data-bs-toggle="collapse" aria-expanded="false"
                class="btn btn-toggle text-white d-flex align-items-center collapsed">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">person</i>
                </div>
                <span class="nav-link-text ms-1">Repairs</span>
            </button>
            <div class="collapse" id="submenu4" style="">
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('repair') ? 'active bg-gradient-primary' : '' }}  "
                        href="{{ url('repair') }}">
                        <span class="nav-link-text ms-1">Repairs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('add-repair') ? 'active bg-gradient-primary' : '' }}  "
                        href="{{ url('add-repair') }}">
                        <span class="nav-link-text ms-1">Add Repair</span>
                    </a>
                </li>
            </div>
            <button data-bs-target="#submenu5" data-bs-toggle="collapse" aria-expanded="false"
            class="btn btn-toggle text-white d-flex align-items-center collapsed">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Repair parts</span>
        </button>
        <div class="collapse" id="submenu5" style="">
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('part') ? 'active bg-gradient-primary' : '' }}  "
                    href="{{ url('part') }}">
                    <span class="nav-link-text ms-1">Repair parts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('add_parts') ? 'active bg-gradient-primary' : '' }}  "
                    href="{{ url('add_parts') }}">
                    <span class="nav-link-text ms-1">Add Repair Parts</span>
                </a>
            </li>
        </div>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('orders') ? 'active bg-gradient-primary' : '' }}  "
                    href="{{ url('orders') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">view_in_ar</i>
                    </div>
                    <span class="nav-link-text ms-1">Order</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="#AbleGod">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="#AbleGod">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">login</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="#AbleGod">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-primary mt-4 w-100" href="#AbleGod" type="button">
                <i class="fa-solid fa-right-from-bracket fa-shake"></i>
                Logout
            </a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</aside>
