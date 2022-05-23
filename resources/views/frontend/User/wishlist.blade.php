@extends('layouts.userfront')
@section('title')
    Wishlist
@endsection

@section('content')
    <div class="container my-3">
        <div class="wishlistitems">
                @if ($wishlist->count() > 0)
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3>Wishlist</h3>
                        </div>
                        <div class="card-body">
                            @foreach ($wishlist as $item)
                                <div class="row product_data mt-3">
                                    <div class="col-md-2 my-auto">
                                        <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}"
                                            class="cartim2" alt="Image here">
                                    </div>
                                    <div class="col-md-2 my-auto text-center">
                                        <h6>{{ $item->products->name }}</h6>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <h6> Ksh {{ $item->products->selling_price }}</h6>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <input type="hidden" name="" class="prod_id" value="{{ $item->prod_id }}">
                                        <input type="hidden" name="" class="qty-input" value="1">
                                        @if ($item->products->qty >= $item->prod_qty)
                                            <h6>Available</h6>
                                        @else
                                            <h6>Out Of Stock</h6>
                                        @endif
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <h6 class=" btn btn-success addToCartBtn"> <i class="fa-solid fa-shopping-cart"></i>
                                            Add to
                                            Cart
                                        </h6>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <h6 class=" btn btn-danger remove-wishlist-item"> <i
                                                class="fa-solid fa-trash-can"></i>
                                            Remove
                                        </h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="card">
                            <div class="card-header bg-info">
                                <h3>Wishlist</h3>
                            </div>
                            <div class="card-body">
                                <h2 class="text-center"><i class="fa-bounce">There Are No <i
                                            class="fa fa-bounce fs-4"> Products
                                        </i> In Your Wishlist</i> </h2>
                            </div>
                        </div>
                    </div>
            </div>
            @endif
        </div>
@endsection
