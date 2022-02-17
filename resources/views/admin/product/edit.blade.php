@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Update Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update.product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-group input-group-static my-3">
                        <label for="exampleFormControlSelect1" class="ms-0">Product Category</label>
                        <select class="form-control">
                                <option value="">{{$products->category->name}}</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" value="{{$products->name}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Slug</label>
                            <input type="text" name="slug" value="{{$products->slug}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Small Description</label>
                            <input type="text" name="small_description" value="{{$products->small_description}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label">Description</label>
                        <div class="input-group input-group-outline my-3">
                            <textarea class="form-control" rows="2" name="description" spellcheck="false">{{$products->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Original Price</label>
                            <input type="number" name="original_price" value="{{$products->original_price}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Selling Price</label>
                            <input type="number" name="selling_price" value="{{$products->selling_price}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Quatity</label>
                            <input type="number" name="qty" value="{{$products->qty}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Tax</label>
                            <input type="number" name="tax" value="{{$products->tax}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="form-check">
                            <label class="custom-control-label">Status</label>
                            <input class="form-check-input" type="checkbox" {{$products->status =="1" ? 'checked':''}} name="status">
                        </div>
                        {{-- checked="0" --}}
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="form-check">
                            <label class="custom-control-label">Trending</label>
                            <input class="form-check-input" type="checkbox" {{$products->trending =="1" ? 'checked':''}} name="trending">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" value="{{$products->meta_title}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Meta Keywords</label>
                            <input type="text" name="meta_keywords" value="{{$products->meta_keywords}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label">Meta Description</label>
                        <div class="input-group input-group-outline my-3">
                            <textarea class="form-control" rows="2" name="meta_description" spellcheck="false">{{$products->meta_description}}</textarea>
                        </div>
                    </div>
                    @if($products->image)
                    <div class="col-sm-12">
                        <div class="input-group input-group-outline my-3 w-25">
                        <img src="{{asset('assets/uploads/products/'.$products->image)}}" class="edit-image w-25 form-control" alt="Product image">
                    </div>
                </div>
                    @endif
                    <div class="col-sm-6">
                        <div class="input-group input-group-outline my-3">
                            <input type="file" name="image" class="form-control-file">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
