@extends('layouts.front')
@section('title')
Checkout
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home
            </a>/
            <a href="{{url('checkout')}}">
                Checkout
            </a>
        </h6>
    </div>
</div>


<div class="container mt-4">
    {{-- <div class="card"> --}}
        <form action="{{url('place-order')}}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Detail</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" name="fname" placeholder="Enter First Name"
                                        value="{{ Auth::user()->name}}" class="form-control fname">
                                        <span id="fname-error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input type="text" name="lname" placeholder="Enter Last Name"
                                        value="{{ Auth::user()->lname}}" class="form-control lname">
                                        <span id="lname-error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email" placeholder="Enter Your Email"
                                        value="{{ Auth::user()->email}}" class="form-control email">
                                        <span id="email-error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" placeholder="Enter Phone Number"
                                        value="{{ Auth::user()->phone}}" class="form-control phone">
                                        <span id="phone-error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input type="text" name="address1" placeholder="Enter Address 1"
                                        value="{{ Auth::user()->address1}}" class="form-control address1">
                                        <span id="address1-error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input type="text" name="address2" placeholder="Enter Address 2"
                                        value="{{ Auth::user()->address2}}" class="form-control address2">
                                        <span id="address2-error" class="text-danger"></span>

                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">City</label>
                                    <input type="text" name="city" placeholder="Enter City Name"
                                        value="{{ Auth::user()->city}}" class="form-control city">
                                        <span id="city-error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State</label>
                                    <input type="text" name="state" placeholder="Enter State Name"
                                        value="{{ Auth::user()->state}}" class="form-control state">
                                        <span id="state-error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Country</label>
                                    <input type="text" name="country" placeholder="Enter Country Name"
                                        value="{{ Auth::user()->country}}" class="form-control country">
                                        <span id="country-error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Pin Code</label>
                                    <input type="text" name="pincode" placeholder="Enter Pin Code"
                                        value="{{ Auth::user()->pincode}}" class="form-control pincode">
                                        <span id="pincode-error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details</h6>
                            <hr>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartitems as $item)
                                    <tr>
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->prod_qty}}</td>
                                        <td> Ksh {{$item->products->selling_price}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <button type="submit" class="btn btn-success w-100 ">Place Order | COD</button>
                            <button type="button" class="btn btn-primary w-100 mt-3 razorpay_btn ">Pay With Razorpay</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        {{--
    </div> --}}
</div>
@endsection

@section('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection
