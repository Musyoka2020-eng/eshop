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
            <a href="{{url('cart')}}">
                Cart
            </a>
        </h6>
    </div>
</div>

<div class="container">
    <div class="card shadow ">
        <div class="card-body">
            @foreach ($cartItems as $item)

            <div class="row product_data border-bottom fs-5 mt-3">
                <div class="col-md-2">
                    <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" class="cartim2"
                        alt="Image here">
                </div>
                <div class="col-md-5">
                    <h6>{{ $item->products->name }}</h6>
                </div>
                <div class="col-md-3">
                    <input type="hidden" name="" class="prod_id" value="{{$item->prod_id}}">
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center w-50">
                        <button class="input-group-text decrement-btn">-</button>
                        <input type="text" name="quantity" value="1" class="form-control qty-input text-center">
                        <button class="input-group-text increment-btn">+</button>
                    </div>
                </div>
                <div class="col-md-2">
                    <h6 class=" btn btn-danger mt-4 ml-2 delete-cart-item"> <i class="fa-solid fa-trash-can"></i> Remove</h6>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
