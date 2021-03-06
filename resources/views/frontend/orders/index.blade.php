@extends('layouts.front')
@section('title')
My orders
@endsection

@section('content')

<div class="py-3 mb-1 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home
            </a>/
            <a href="{{url('my-orders')}}">
                Collection
            </a>
        </h6>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center bg-primary">
                    <h4 class="text-white">My Orders
                    <a href="{{url('user')}}" class="btn btn-outline-secondary btn-sm float-end">Dashboard</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tracking Number</th>
                                <th>Date</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($orders as $item)
                            <tr>
                                <td>{{ $item->tracking_no}}</td>
                                <td>{{ $item->created_at->format('d M Y ')}}</td>
                                <td> Ksh {{ $item->total_price}}</td>
                                <td>{{ $item->status == '0'? 'Pending': 'Completed'}}</td>
                                <td>
                                    <a href="{{ url('view-order/'.$item->id) }}" class="btn btn-primary">View</a>
                                    {{-- <a href="{{ url('delete-order/'.$item->id) }}"
                                        class="btn btn-danger">delete</a> --}}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
