@extends('layouts.admin')

@section('title')
Admin:Parts
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Part</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update_part/'.$parts->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <div class="input-group input-group-outline my-1">
                            <input type="text" name="part_name" value="{{ $parts->part_name }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Price</label>
                        <div class="input-group input-group-outline my-1">
                            <input type="number" name="cost" value="{{ $parts->cost }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Quatity</label>
                        <div class="input-group input-group-outline my-1">
                            <input type="number" name="qty" value="{{ $parts->qty }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6 mt-4">
                        <div class="form-check" >
                            <label class="custom-control-label">Status</label>
                            <input class="form-check-input" type="checkbox"  {{ $parts->status =="1" ? 'checked':''}} name="status">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label">Description</label>
                        <div class="input-group input-group-outline my-1">
                            <textarea class="form-control" rows="2" name="decription" spellcheck="false">{{ $parts->decription }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 my-2">
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
