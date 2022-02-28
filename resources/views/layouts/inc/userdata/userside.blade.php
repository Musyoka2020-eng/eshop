@extends('layouts.userfront')
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Dashboard</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fa-solid fa-house"></i> <span class="ms-1 d-none d-sm-inline">Hello,
                                {{Auth::user()->name}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-dashboard"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{url('myprofile/'.Auth::user()->name)}}" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline">Profile</span></a>
                            </li>
                            <li>
                                <a href="{{url('cart')}}" class="nav-link px-0">
                                    <span class="d-none d-sm-inline">My Cart</span>
                                     <span class="badge badge-pill bg-success cart-count">0</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('wishlist')}}" class="nav-link px-0">
                                    <span class="d-none d-sm-inline">Wishlist</span>
                                    <span class="badge badge-pill bg-primary wishlist-count">0</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('my-orders')}}" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-table"></i> <span class="ms-1 d-none d-sm-inline">Orders</span></a>
                    </li>
                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fa-solid fa-toolbox"></i> <span class="ms-1 d-none d-sm-inline">Repairs</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1</a>
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
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30"
                            class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
            @include('layouts.inc.userdata.dashboard')
        </div>
    </div>
</div>






{{--
<div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
    <ul class="nav flex-column text-white w-100">
        <a href="#" class="nav-link h3 text-white my-2">
            <h6> Hello {{ Auth::user()->name}}</h6>
        </a>
        <a href="#" class="nav-link">
            <span class="mx-2">My Profile</span>
        </a>
        <a href="{{url('my-orders')}}" class="nav-link">
            <span class="mx-2">Orders</span>
        </a>
        <a href="{{url('cart')}}" class="nav-link">
            <span class="mx-2">My Cart</span>
            <span class="badge badge-pill bg-success cart-count">0</span>
        </a>
        <a href="{{url('wishlist')}}" class="nav-link">
            <span class="mx-2">wishlist</span>
            <span class="badge badge-pill bg-primary wishlist-count">0</span>
        </a>
        <a href="#" class="nav-link">
            <span class="mx-2">Repairs</span>
        </a>
        <a href="#" class="nav-link">
            <span class="mx-2">Services</span>
        </a>
    </ul>
</div>
<div class="p-1 my-container active-cont">

    <div class="container">
        <div class="row">
            <div class="col-md-1 p-0 m-0">
            </div>
            <div class="col-md-1 p-0 m-0">
                <a class="btn border-0mar float-start" id="menu-btn">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </div>
            <div class="col-md-8">
                <h5 class="alert alert-danger">Welcome to the user dashboard please ensure your profile is upto date
                </h5>
            </div>
        </div>
        @include('layouts.inc.userdata.dashboard')
    </div>
</div>
<style>
    .side-navbar {
        width: 180px;
        height: 100%;
        position: fixed;
        margin-left: -300px;
        background-color: #100901;
        transition: 0.5s;
    }

    .nav-link:active,
    .nav-link:focus,
    .nav-link:hover {
        background-color: #ffffff26;
    }

    .my-container {
        transition: 0.4s;
    }

    .active-nav {
        margin-left: 0;
    }

    /* for main section */
    .active-cont {
        margin-left: 180px;
    }

    #menu-btn {
        background-color: #100901;
        color: #fff;
        margin-left: -62px;
    }
</style>
<script>
    var menu_btn = document.querySelector("#menu-btn");
var sidebar = document.querySelector("#sidebar");
var container = document.querySelector(".my-container");
menu_btn.addEventListener("click", () => {
  sidebar.classList.toggle("active-nav");
  container.classList.toggle("active-cont");
});
</script> --}}
