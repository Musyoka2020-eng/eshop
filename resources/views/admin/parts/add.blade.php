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
            <form action="{{ url('insert_parts') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="part_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Price</label>
                            <input type="number" name="cost" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Quatity</label>
                            <input type="number" name="qty" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6 mt-3">
                        <div class="form-check">
                            <label class="custom-control-label">Status</label>
                            <input class="form-check-input" type="checkbox" name="status">
                        </div>
                        {{-- checked="0" --}}
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label">Description</label>
                        <div class="input-group input-group-outline my-1">
                            <textarea class="form-control" rows="2" name="decription" spellcheck="false"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 my-2">
                        <button type="submit" class="btn btn-primary float-end">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
