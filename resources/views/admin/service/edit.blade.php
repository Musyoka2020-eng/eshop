@extends('layouts.admin')

@section('title')
Admin:Services
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Service</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update.service/'.$service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <div class="input-group input-group-outline my-1">
                        <input type="text" name="serv_name" value= "{{ $service->serv_name }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Slug</label>
                    <div class="input-group input-group-outline my-1">
                        <input type="text" name="serv_slug" value="{{ $service->serv_slug }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Cost</label>
                    <div class="input-group input-group-outline my-1">
                        <input type="number" name="cost" value="{{ $service->cost }}" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6 mt-4">
                    <div class="form-check">
                        <label class="custom-control-label">Status</label>
                        <input class="form-check-input" type="checkbox"  {{$service->status =="1" ? 'checked':''}} name="status">
                    </div>
                    {{-- checked="0" --}}
                </div>
                <div class="col-sm-12">
                    <label class="form-label">Description</label>
                    <div class="input-group input-group-outline my-1">
                        <textarea class="form-control" rows="2" name="description" spellcheck="false">{{ $service->description }}</textarea>
                    </div>
                </div>
                @if($service->image)
                <div class="col-sm-12">
                    <div class="input-group input-group-outline my-3 w-25">
                    <img src="{{asset('assets/uploads/services/'.$service->image)}}" class="edit-image w-25 form-control" alt="Category image">
                </div>
            </div>
                @endif
                <div class="col-sm-6">
                    <div class="input-group input-group-outline my-3">
                        <input type="file" name="image" class="form-control-file">
                    </div>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary float-end">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
