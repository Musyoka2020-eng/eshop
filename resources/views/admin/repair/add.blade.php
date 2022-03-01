@extends('layouts.admin')

@section('title')
Admin:Products
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Create New Repair</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-repair') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-group input-group-static my-3">
                    <label for="exampleFormControlSelect1" class="ms-0">Repair</label>
                    <select class="form-control" name="type">
                        @foreach ($services as $item)
                            <option value="{{ $item->id }}">{{ $item->serv_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="prod_name" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Client Name</label>
                        <input type="text" name="user_name" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Client Phone</label>
                        <input type="text" name="contact" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Client Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                </div>
                <div class="col-sm-12">
                    <label class="form-label">Conditions</label>
                    <div class="input-group input-group-outline my-3">
                        <textarea class="form-control" rows="2" name="condition" spellcheck="false"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Total Price</label>
                        <input type="number" name="total_price" class="form-control">
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
