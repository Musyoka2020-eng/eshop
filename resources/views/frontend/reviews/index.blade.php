@extends('layouts.front')
@section('title')
Write Review
@endsection

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($verified_purchase->count() > 0)
                    <h5>You are writing a review for {{$product->name}}</h5>
                    <form action="{{url('/add-review')}}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <textarea name="user_review" rows="5" class="form-control" placeholder="Write a review"></textarea>
                        <button class="btn btn-outline-success mt-3">Submit Review</button>
                    </form>
                    @else
                    <div class="alert alert-danger">
                        <h5>You are not eligible to review this product.</h5>
                        <p>
                            For the trustworthiness of the reviews, only customers who purchased
                            the product can write a review about the product.
                        </p>
                        <a class="btn btn-dark mt-3" href="{{url('/')}}">Go to home</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection