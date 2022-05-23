@extends('layouts.userfront')
@section('title')
    My orders
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($userepair->count() > 0)
                    <div class="card shadow">
                        <div class="card-header bg-success">
                            <h3>Repairs</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>Product Name</td>
                                        <td>Tracking No</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userepair as $item)
                                        <tr>
                                            <td>{{ $item->prod_name }}</td>
                                            <td>{{ $item->tracking_code }}</td>
                                            <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                                            <td>
                                                <a href="{{ url('view-repair/' . $item->id) }}"
                                                    class="btn btn-primary">View</a>
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
                            <h3>Repairs</h3>
                        </div>
                        <div class="card-body text-center text-black-50">
                            <h3 class="">You have no <i class="fa-solid fa-screwdriver-wrench"></i>
                                items</h3>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection
