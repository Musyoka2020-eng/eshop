@extends('layouts.admin')

@section('title')
    Admin:Parts
@endsection

@section('content')
    <div class="card">
        <div class="card-header p-0 pt-2 px-3">
            <h4>Parts Page</h4>
            <hr>
        </div>
        <div class="card-body px-2 p-2">
            <table class="table table-bordered table-striped">
                <div class="row px-3">
                    <a href="{{ url('add_parts') }}" class="text-decoration-underline link link-success fs-5">Add parts</a>
                </div>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parts as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->part_name }}</td>
                            <td>{{ $item->cost }}</td>
                            <td>{{ $item->status == '0' ? 'Inactive' : 'Active' }}</td>
                            <td>
                                <a href="{{ url('edit_part/' . $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
