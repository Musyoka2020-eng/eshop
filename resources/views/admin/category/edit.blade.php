@extends('layouts.admin')

@section('title')
Admin:Category
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit|Update Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update.category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <div class="input-group input-group-outline my-1">
                            <input type="text"  name="name" value="{{$category->name}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Slug</label>
                        <div class="input-group input-group-outline my-1">
                            <input type="text" name="slug" value="{{$category->slug}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label">Description</label>
                        <div class="input-group input-group-outline my-1">
                            <textarea class="form-control" rows="2" placeholder="" name="description"
                                spellcheck="false">{{$category->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="form-check">
                            <label class="custom-control-label">Status</label>
                            <input class="form-check-input" type="checkbox" {{$category->status =="1" ? 'checked':''}} name="status">
                        </div>
                        {{-- checked="0" --}}
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="form-check">
                            <label class="custom-control-label">Popular</label>
                            <input class="form-check-input" type="checkbox" {{$category->popular =="1" ? 'checked':''}} name="popular">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label">Meta Title</label>
                        <div class="input-group input-group-outline my-1">
                            <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label">Meta Keywords</label>
                        <div class="input-group input-group-outline my-1">
                            <input type="text" name="meta_keywords" value="{{$category->meta_keywords}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label">Meta Description</label>
                        <div class="input-group input-group-outline my-1">
                            <textarea class="form-control" rows="2" name="meta_descrip"
                                spellcheck="false">{{$category->meta_descrip}}</textarea>
                        </div>
                    </div>
                    @if($category->image)
                    <div class="col-sm-12">
                        <div class="input-group input-group-outline my-1 w-25">
                        <img src="{{asset('assets/uploads/category/'.$category->image)}}" class="edit-image w-25 form-control" alt="Category image">
                    </div>
                </div>
                    @endif
                    <div class="col-sm-6">
                        <div class="input-group input-group-outline my-2">
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
