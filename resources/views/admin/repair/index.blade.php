@extends('layouts.admin')

@section('title')
    Admin:Repairs
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Repairs</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Conditions</th>
                        {{-- <th>Image</th> --}}
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($repairs as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->prod_name }}</td>
                            <td>{{ $item->created_at->format('d M y') }}</td>
                            <td>{{ $item->condition }}</td>
                            {{-- <td>
                          <img src="{{asset('assets/uploads/repairs/'.$item->image)}}" class="prod-image" alt="Image here">
                        </td> --}}
                            {{-- <td>{{ $item->status }}</td> --}}
                            @if ($item->status == 0)
                                <td>Pending</td>
                            @else
                                <td>Viewed</td>
                            @endif
                            <td>
                                <a href="{{ url('edit-repair/' . $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('delete-repair/' . $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
