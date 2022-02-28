@extends('layouts.front')
@section('title')
Outlets Electronics
@endsection

@section('content')
@include('layouts.inc.slider')

<main>
    {{-- <div class="container py-5">
        <div class="row flex-nowrap">
            <div class="col-auto px-0">
                <div id="sidebar" class="collapse collapse-horizontal show">
                    <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start min-vh-100">
                        <a href="/" class="list-group-item  d-inline-block text-truncate" data-bs-parent="#sidebar"><i
                                class="fa fa-home"></i> <span>Home</span> </a>
                        <a href="#" class="list-group-item  d-inline-block text-truncate" data-bs-parent="#sidebar"><i
                                class="fa fa-film"></i> <span>New Products</span></a>
                        <a href="#" class="list-group-item  d-inline-block text-truncate" data-bs-parent="#sidebar"><i
                                class="fa fa-heart"></i> <span>All Products</span></a>
                        <a href="#" class="list-group-item  d-inline-block text-truncate" data-bs-parent="#sidebar"><i
                                class="fa-solid fa-list"></i>
                            <span>Categories</span></a>
                        <a href="#" class="list-group-item  d-inline-block text-truncate" data-bs-parent="#sidebar"><i
                                class="fa fa-clock"></i> <span>Most Rated</span></a>
                        <a href="#" class="list-group-item  d-inline-block text-truncate" data-bs-parent="#sidebar"><i
                                class="fa fa-archive"></i> <span>Best
                                Wishlist</span></a>
                        <a href="#" class="list-group-item  d-inline-block text-truncate" data-bs-parent="#sidebar"><i
                                class="fa fa-gear"></i> <span>Featured
                                Products</span></a>
                        <a href="#" class="list-group-item  d-inline-block text-truncate" data-bs-parent="#sidebar"><i
                                class="fa fa-calendar"></i> <span>Offers</span></a>
                        <a href="#" class="list-group-item  d-inline-block text-truncate" data-bs-parent="#sidebar"><i
                                class="fa fa-envelope"></i> <span>Services</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="flex-shrink-0 p-3 bg-white" style="width: 150px;">
        <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
            <svg class="bi me-2" width="30" height="24">
                <use xlink:href="#bootstrap"></use>
            </svg>
            <span class="fs-5 fw-semibold">Outlet's</span>
        </a>
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#home-collapse" aria-expanded="false">
                    Home
                </button>
                <div class="collapse" id="home-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-dark rounded">Overview</a></li>
                        <li><a href="#" class="link-dark rounded">Updates</a></li>
                        <li><a href="#" class="link-dark rounded">Reports</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#dashboard-collapse" aria-expanded="false">
                    Dashboard
                </button>
                <div class="collapse" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-dark rounded">Overview</a></li>
                        <li><a href="#" class="link-dark rounded">Weekly</a></li>
                        <li><a href="#" class="link-dark rounded">Monthly</a></li>
                        <li><a href="#" class="link-dark rounded">Annually</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#orders-collapse" aria-expanded="false">
                    Orders
                </button>
                <div class="collapse" id="orders-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-dark rounded">New</a></li>
                        <li><a href="#" class="link-dark rounded">Processed</a></li>
                        <li><a href="#" class="link-dark rounded">Shipped</a></li>
                        <li><a href="#" class="link-dark rounded">Returned</a></li>
                    </ul>
                </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#account-collapse" aria-expanded="false">
                    Account
                </button>
                <div class="collapse" id="account-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-dark rounded">New...</a></li>
                        <li><a href="#" class="link-dark rounded">Profile</a></li>
                        <li><a href="#" class="link-dark rounded">Settings</a></li>
                        <li><a href="#" class="link-dark rounded">Sign out</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div class="b-example-divider"></div>
    <div class="d-flex flex-column flex-shrink-1 p-3 bg-light">
        <div class="py-4">
            <div class="container">
                <div class="row ">
                    <h2>Featured Products</h2>
                    <div class="owl-carousel featured-carousel owl-theme">
                        @foreach ($featured_products as $prod)
                        <div class="item">
                            <div class="card">
                                <a href="{{url('category/'.$prod->category->slug.'/'.$prod->slug)}}">
                                    <img src="{{ asset('assets/uploads/products/' . $prod->image) }}" class="tred"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5>{{ $prod->name }}</h5>
                                        <span class="float-start">Ksh {{ $prod->selling_price }}</span>
                                        <span class="float-end"><s> Ksh{{ $prod->original_price }}</s></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="py-4">
            <div class="container">
                <div class="row ">
                    <h2>Trending Category</h2>
                    <div class="owl-carousel featured-carousel owl-theme">
                        @foreach ($trending_category as $tcategory)
                        <div class="item">
                            <a href="{{url('view-category/'.$tcategory->slug)}}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/' . $tcategory->image) }}" class="tred"
                                        alt="Category image">
                                    <div class="card-body">
                                        <h5>{{ $tcategory->name }}</h5>
                                        <p>
                                            {{$tcategory->description}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="py-4 pb">
            <div class="container">
                <div class="row ">
                    <h2>Rated Products</h2>
                    <div class="owl-carousel featured-carousel owl-theme">
                        @foreach ($rated_products as $prod)
                        <div class="item">
                            <div class="card">
                                <a href="{{url('category/'.$prod->product->category->slug.'/'.$prod->product->slug)}}">
                                    <img src="{{ asset('assets/uploads/products/' . $prod->product->image) }}"
                                        class="tred" alt="Product image">
                                    <div class="card-body">
                                        <h5>{{ $prod->product->name }}</h5>
                                        <span class="float-start">Ksh {{ $prod->product->selling_price }}</span>
                                        <span class="float-end"><s> Ksh{{ $prod->product->original_price
                                                }}</s></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<hr>
    <footer class="py-4">
        <div class="row w-100 pl-5">
            <div class="col-2">
                <h5>Computer</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div>

            <div class="col-2">
                <h5>Electronics</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div>

            <div class="col-2">
                <h5>Households</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div>

            <div class="col-4 offset-1">
                <form>
                    <h5>Subscribe to our newsletter</h5>
                    <p>Monthly digest of whats new and exciting from us.</p>
                    <div class="d-flex w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex justify-content-between py-4 my-4 border-top">
            <p>© 2021 Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#twitter"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#instagram"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#facebook"></use>
                        </svg></a></li>
            </ul>
        </div>
    </footer>
@endsection

@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
</script>
@endsection
