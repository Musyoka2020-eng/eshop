@extends('layouts.admin')

@section('title')
Admin:Products
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Repair</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update.repair/'.$repairs->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="input-group input-group-static my-3">
                    <label for="exampleFormControlSelect1" class="ms-0">Repair</label>
                    <input type="text" name="type" value="{{ $repairs->type }}" id="" class="form-control" disabled>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="prod_name" value="{{ $repairs->prod_name }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Client Name</label>
                        <input type="text" name="user_name" value="{{ $repairs->user_name }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Client Phone</label>
                        <input type="text" name="contact" value="{{ $repairs->contact }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Client Email</label>
                        <input type="text" name="email" value="{{ $repairs->email }}" class="form-control">
                    </div>
                </div>
                <div class="col-sm-12">
                    <label class="form-label">Conditions</label>
                    <div class="input-group input-group-outline my-3">
                        <textarea class="form-control" rows="2" name="condition" spellcheck="false">{{ $repairs->condition }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Total Price</label>
                        <input type="number" name="total_price" value="{{ $repairs->total_price }}" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6 mt-4">
                    <div class="form-check" >
                        <label class="custom-control-label">Status</label>
                        <input class="form-check-input" type="checkbox"  {{ $repairs->status =="1" ? 'checked':''}} name="status">
                    </div>
                </div>
                <div class="col-sm-12">
                    <label class="form-label">Description</label>
                    <div class="input-group input-group-outline my-3">
                        <textarea class="form-control" rows="2" name="description" spellcheck="false">{{ $repairs->description }}</textarea>
                    </div>
                </div>
                @if($repairs->image)
                <div class="col-sm-12">
                    <div class="input-group input-group-outline my-3 w-25">
                    <img src="{{asset('assets/uploads/repairs/'.$repairs->image)}}" class="edit-image w-25 form-control" alt="Category image">
                </div>
            </div>
                @endif
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
