@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Order View
                    <a href="{{url('orders')}}" class="btn btn-warning float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
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
                        <h4 class="px-2">Grand Total: <span class="float-end"> Ksh {{$orders->total_price}}</span>
                        </h4>
                        <div class="mt-3">
                            <form action="{{url('update-order/'.$orders->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                            <div class="input-group input-group-static mb-4">
                                <label  class="ms-0">Order Status</label>
                                <select class="form-control" name="order_status">
                                    <option {{ $orders->status == '0'? 'selected':''}} value="0" >Pending</option>
                                    <option {{ $orders->status == '1'? 'selected':''}} value="1" >Complete</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary float-end mt-3">Update</button>
                        </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
