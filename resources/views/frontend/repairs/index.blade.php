@extends('layouts.front')
@section('title')
    Repairs
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a>/
                <a href="{{ url('#') }}">
                    Repairs
                </a>
            </h6>
        </div>
    </div>

    <div class="py-4">
        <div class="container">
            <div class="row ">
                <h2>Search Repairs</h2>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>Enter your repair email to search for the repair product.</h5>
                            <form action="{{ url('searchrepair') }}" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input type="search" class="form-control" name="email" id="search_repair"
                                        placeholder="Search Repair" aria-describedby="basic-addon1">
                                    <button type="submit" class="input-group-text"><i
                                            class="fa-solid fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-8 mb-3">
                    <div class="card">
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
                                    @foreach ($repairsn as $item)
                                        <tr>
                                            <td>{{ $item->prod_name }}</td>
                                            <td>{{ $item->tracking_code }}</td>
                                            <td>{{ $item->status  == '0'? 'Pending': 'Completed' }}</td>
                                            <td>
                                                <a href="{{ url('view-repair/'. $item->id) }}" class="btn btn-primary">View</a>
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
    </div>
@endsection
