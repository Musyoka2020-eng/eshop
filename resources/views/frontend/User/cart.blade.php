@extends('layouts.userfront')
@section('title')
My Cart
@endsection
@section('content')
<div class="container my-5 cartitems">
    <div class="">
        @if ($cartItems->count() > 0)
        <div class="">
            @php $total = 0;@endphp
            @foreach ($cartItems as $item)
            <div class="row product_data border-bottom fs-5 mt-3">
                <div class="col-md-2 my-auto">
                    <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" class="cartim2"
                        alt="Image here">
                </div>
                <div class="col-md-3 my-auto text-center">
                    <h6>{{ $item->products->name }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6> Ksh {{ $item->products->selling_price }}</h6>
                </div>
                <div class="col-md-3 my-auto">
                    <input type="hidden" name="" class="prod_id" value="{{$item->prod_id}}">
                    @if ($item->products->qty >= $item->prod_qty)
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width: 130px;">
                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                        <input type="text" name="quantity" value="{{$item->prod_qty}}"
                            class="form-control qty-input text-center">
                        <button class="input-group-text changeQuantity increment-btn">+</button>
                    </div>
                    @php $total += $item->products->selling_price*$item->prod_qty ; @endphp
                    @else
                    <h6>Out Of Stock</h6>
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <h6 class=" btn btn-danger mt-4 ml-2 delete-cart-item"> <i class="fa-solid fa-trash-can"></i> Remove
                    </h6>
                </div>
            </div>
            @endforeach
        </div>
        <div class="">
            <h6> Total Price: Ksh {{$total}}</h6>
            <a href="{{url('checkout')}}"> <button type="submit" class="btn btn-outline-success float-end">Proceed to
                    Checkout</button></a>
        </div>
        @else
        <div class=" text-center">
            <h2>Your <i class="fa-solid fa-cart-shopping fa-bounce"></i>Cart is empty </h2>
            {{-- <a href="{{url('category')}}" class="btn btn-outline-primary float-end">Continue Shopping</a> --}}
        </div>
        @endif
    </div>
</div>
@endsection
