@extends('layouts.front')
@section('title')
Update review
@endsection

@section('content')
<div class="container shadow mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5>You are updating a review for {{$review->product->name}}</h5>
                    <form action="{{url('/update-review')}}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="review_id" value="{{$review->id}}">
                        <textarea name="user_review" rows="5" class="form-control" placeholder="Write a review"> {{$review->user_review}} </textarea>
                        <button class="btn btn-outline-success mt-3">Update Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
