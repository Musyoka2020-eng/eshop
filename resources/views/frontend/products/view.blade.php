@extends('layouts.front')
@section('title', $products->name)

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
           <a href="{{url('category')}}">
            Collections
        </a> /
        <a href="{{url('view-category/'.$products->category->slug)}}">
            {{$products->category->name}}
        </a>/
        <a href="{{url('category/'.$products->category->slug.'/'.$products->slug)}}">
            {{$products->name}}
        </a>
        </h6>
    </div>
</div>
<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('assets/uploads/products/'.$products->image)}}" class="cartim" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$products->name}}
                        @if ($products->trending == '1')
                        <label for="" style="font-size: 16px;"
                            class="float-end badge bg-danger trending_tag">Trending</label>
                        @endif
                    </h2>

                    <hr>
                    <label class="me-3">Original Price : <s>Ksh {{$products->original_price}}</s></label>
                    <label class="fw-bold">Selling Price : Ksh {{$products->selling_price}}</label>
                    <p class="mt-3">
                        {!!$products->small_description!!}
                    </p>
                    <hr>
                    @if ($products->qty > 0)
                    <lable class="badge bg-success">In stock</lable>
                    @else
                    <lable class="badge bg-danger">Out of stock</lable>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{$products->id}}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                {{-- <div class="col-4"> --}}
                                    <input type="text" name="quantity" value="1"
                                        class="form-control w-10 text-center qty-input">
                                    {{--
                                </div> --}}
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <br>
                            <button type="button" class="btn btn-success  me-3 float-start">Add to Wishlist <i
                                    class="fa-solid fa-heart"></i></button>
                            <button type="button" class="btn btn-primary addToCartBtn me-3 float-start">Add to Cart <i
                                    class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <p>
                    {{$products->description}}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
