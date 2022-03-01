@extends('layouts.admin')

@section('title')
Admin:Services
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Create New Service</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-service') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="serv_name" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="serv_slug" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Cost</label>
                        <input type="number" name="cost" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6 mt-4">
                    <div class="form-check">
                        <label class="custom-control-label">Status</label>
                        <input class="form-check-input" type="checkbox" name="status">
                    </div>
                    {{-- checked="0" --}}
                </div>
                <div class="col-sm-12">
                    <label class="form-label">Description</label>
                    <div class="input-group input-group-outline my-3">
                        <textarea class="form-control" rows="2" name="description" spellcheck="false"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-group input-group-outline my-3">
                        <input type="file" name="image" class="form-control-file">
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
