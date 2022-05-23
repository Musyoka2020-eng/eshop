@extends('layouts.userfront')
@section('title')
    My orders
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($orders->count() > 0)
                    <div class="card shadow">
                        <div class="card-header bg-success">
                            <h3>Orders</h3>
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
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>{{ $item->created_at->format('d M Y ') }}</td>
                                            <td> Ksh {{ $item->total_price }}</td>
                                            <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                                            <td>
                                                <a href="{{ url('view-order/' . $item->id) }}"
                                                    class="btn btn-primary">View</a>
                                                {{-- <a href="{{ url('delete-order/'.$item->id) }}"
                                                    class="btn btn-danger">delete</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-header text-center bg-primary">
                            <h3>Orders</h3>
                        </div>
                        <div class="card-body text-center text-black-50">
                            <h3 class="">You have no <i class="fa-solid fa-clipboard-list fa-lg"></i> items
                            </h3>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection
