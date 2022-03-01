@extends('layouts.admin')

@section('title')
Admin:Services
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Services Page</h4>
        <hr>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->serv_name }}</td>
                        <td>{{ $item->created_at->format('Y/M/D') }}</td>
                        <td>
                          <img src="{{asset('assets/uploads/services/'.$item->image)}}" class="prod-image" alt="Image here">
                        </td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                           <a href="{{url('edit-service/'.$item->id)}}"  class="btn btn-primary btn-sm">Edit</a>
                           <a href="{{url('delete-service/'.$item->id) }}"  class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
