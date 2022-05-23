@extends('layouts.userfront')
@section('title')
    My order
@endsection

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Invoice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <h1>Outlets</h1>
                            </div>
                            <div class="col-md-6 ms-auto">
                                <div class="card border-0">
                                    <div class="card-body text-end">
                                        <span>Name:
                                            <span>{{ Auth::user()->name . ' ' . Auth::user()->lname }}</span></span><br>
                                        <span>Email: <span>{{ Auth::user()->email }}</span></span><br>
                                        <span>Phone: <span>+254 {{ Auth::user()->phone }}</span></span><br>
                                        <span>Address: <span>{{ Auth::user()->address1 }}</span></span><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card border-0">
                                    <div class="card-body text-start">
                                        <span>Tel: <span>+254 7352564764</span></span><br>
                                        <span>Email: <span>outlets@yahoo.com</span></span><br>
                                        <span>Address: <span>Thika, Acrade Lane</span></span><br>
                                        <span>Outlets Electronics & Supplies Shop</span><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
                                                <td>{{ $item->qty }}</td>
                                                <td> Ksh {{ $item->price }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}"
                                                        width="50px" alt="">
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="window.print()">Print</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Shipping Details</h4>
                                        <hr>
                                        <label class="form-label" for="">First Name</label>
                                        <div class="border p-2 form-control">{{ $orders->fname }}</div>
                                        <label class="form-label" for="">Last Name</label>
                                        <div class="border p-2 form-control">{{ $orders->lname }}</div>
                                        <label class="form-label" for="">Email</label>
                                        <div class="border p-2 form-control">{{ $orders->email }}</div>
                                        <label class="form-label" for="">Contact</label>
                                        <div class="border p-2 form-control">{{ $orders->phone }}</div>
                                        <label class="form-label" for="">Shipping Address</label>
                                        <div class="border p-2 form-control">
                                            {{ $orders->address1 }},<br>
                                            {{ $orders->address2 }},<br>
                                            {{ $orders->city }},<br>
                                            {{ $orders->state }},
                                            {{ $orders->country }},
                                        </div>
                                        <label class="form-label" for="">Zip Code</label>
                                        <div class="border p-2 form-control">{{ $orders->pincode }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
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
                                                <td>{{ $item->qty }}</td>
                                                <td> Ksh {{ $item->price }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}"
                                                        width="50px" alt="">
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                                <h6 class="px-2">Grand Total: <span class="float-end"> Ksh
                                        {{ $orders->total_price }}</span></h6>
                                <h6 class="px-2">Payment Mode:{{ $orders->payment_mode }}</h6>
                                <br>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Preview
                                </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
