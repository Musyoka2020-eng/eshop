@extends('layouts.front')
@section('title')
Outlets Electronics
@endsection

@section('content')
@include('layouts.inc.slider')

<main>
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
                                        <span class="float-end"><s> Ksh{{ $prod->product->original_price}}</s></span>
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
@endsection

@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            responsive: {
                400: {
                    items: 1
                },
                600: {
                    items: 2
                },
                800: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
</script>
@endsection
