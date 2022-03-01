@extends('layouts.userfront')
@section('title')
My orders
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="">
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
