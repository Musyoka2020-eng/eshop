@extends('layouts.userfront')
@section('title')
My order
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4>Shipping Details</h4>
                            <hr>
                            <label class="form-label" for="">First Name</label>
                            <div class="border p-2 form-control">{{$orders->fname}}</div>
                            <label class="form-label" for="">Last Name</label>
                            <div class="border p-2 form-control">{{$orders->lname}}</div>
                            <label class="form-label" for="">Email</label>
                            <div class="border p-2 form-control">{{$orders->email}}</div>
                            <label class="form-label" for="">Contact</label>
                            <div class="border p-2 form-control">{{$orders->phone}}</div>
                            <label class="form-label" for="">Shipping Address</label>
                            <div class="border p-2 form-control">
                                {{$orders->address1}},<br>
                                {{$orders->address2}},<br>
                                {{$orders->city}},<br>
                                {{$orders->state}},
                                {{$orders->country}},
                            </div>
                            <label class="form-label" for="">Zip Code</label>
                            <div class="border p-2 form-control">{{$orders->pincode}}</div>
                        </div>
                        <div class="col-md-6">
                            <h4>Order Details</h4>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orders->orderitems as $item)
                                    <tr>
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->qty}}</td>
                                        <td> Ksh {{ $item->price }}</td>
                                        <td>
                                            <img src="{{asset('assets/uploads/products/'.$item->products->image)}}"
                                                width="50px" alt="">
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>
                            <h6 class="px-2">Grand Total: <span class="float-end"> Ksh {{$orders->total_price}}</span></h6>
                            <h6 class="px-2">Payment Mode:{{$orders->payment_mode}}</h6>
                            <br>
                            <div type="button" class="btn btn-success float-end" onclick="window.print()">Print</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
