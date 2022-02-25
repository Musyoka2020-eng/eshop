@extends('layouts.front')
@section('title')
My Cart
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home
            </a>/
            <a href="{{url('wishlist')}}">
                Wishlist
            </a>
        </h6>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow wishlistitems">
        <div class="card-body">
            @if ($wishlist->count() > 0 )
                @foreach ($wishlist as $item)
                <div class="row product_data mt-3">
                    <div class="col-md-2 my-auto">
                        <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" class="cartim2"
                            alt="Image here">
                    </div>
                    <div class="col-md-2 my-auto text-center">
                        <h6>{{ $item->products->name }}</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6> Ksh {{ $item->products->selling_price }}</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <input type="hidden" name="" class="prod_id" value="{{$item->prod_id}}">
                        <input type="hidden" name="" class="qty-input" value="1">
                        @if ($item->products->qty >= $item->prod_qty)
                        <h6>Available</h6>
                        @else
                        <h6>Out Of Stock</h6>
                        @endif
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6 class=" btn btn-success addToCartBtn"> <i class="fa-solid fa-shopping-cart"></i> Add to Cart
                        </h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6 class=" btn btn-danger remove-wishlist-item"> <i class="fa-solid fa-trash-can"></i> Remove
                        </h6>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <h4>There Are No Product In Your Wishlist</h4>
            @endif
        </div>


        <div class="card-footer">
        </div>
    </div>
</div>
@endsection
