@extends('layouts.front')
@section('title')
    View Repair
@endsection

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('add-repairrate') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Review & Rate</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            @foreach ($repair as $item)
                                <input type="hidden" name="repair_id" value="{{ $item->id }}">
                            @endforeach
                            <label for="recipient-name" class="col-form-label">Rating</label>
                            <div class="rating-css">
                                <div class="star-icon">
                                    @if ($user_rating)
                                        @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                            <input type="radio" value="{{ $i }}" name="repair_rating" checked
                                                id="rating{{ $i }}">
                                            <label for="rating{{ $i }}" class="fa fa-star"></label>
                                        @endfor
                                        @for ($j = $user_rating->stars_rated + 1; $j <= 5; $j++)
                                            <input type="radio" value="{{ $j }}" name="repair_rating"
                                                id="rating{{ $j }}">
                                            <label for="rating{{ $j }}" class="fa fa-star"></label>
                                        @endfor
                                    @else
                                        <input type="radio" value="1" name="repair_rating" checked id="rating1">
                                        <label for="rating1" class="fa fa-star"></label>
                                        <input type="radio" value="2" name="repair_rating" id="rating2">
                                        <label for="rating2" class="fa fa-star"></label>
                                        <input type="radio" value="3" name="repair_rating" id="rating3">
                                        <label for="rating3" class="fa fa-star"></label>
                                        <input type="radio" value="4" name="repair_rating" id="rating4">
                                        <label for="rating4" class="fa fa-star"></label>
                                        <input type="radio" value="5" name="repair_rating" id="rating5">
                                        <label for="rating5" class="fa fa-star"></label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Write a review</label>
                            @if ($review)

                            @foreach ($review as $items)
                            <textarea class="form-control" name="user_review" id="message-text">{{ $items->user_review }}</textarea>    
                            @endforeach
                            @else
                            <textarea class="form-control" name="user_review" id="message-text"></textarea>  
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="Submit" class="btn btn-primary">Send Review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            @foreach ($repair as $item)
                <h6 class="mb-0">
                    <a href="{{ url('/') }}">
                        Home
                    </a>/
                    <a href="{{ url('#') }}">
                        Collection
                    </a>/
                    <a href="{{ url('#') }}">
                        {{ $item->prod_name }}
                    </a>
                </h6>
            @endforeach
        </div>
    </div>

    <div class="py-4">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                        @foreach ($repair as $item)
                            <div class="col-md-4">
                                <h5 class="text-center mb-2">{{ $item->prod_name }}</h5>
                                <img src="{{ asset('assets/uploads/repairs/' . $item->image) }}" class='cartim'
                                    alt="Repair Item">
                            </div>
                            <div class="col-md-8 mb-3">
                                <div class="row">
                                    <h2>
                                        {{ $item->name }}
                                        @if ($item->status == '1')
                                            <label for="" style="font-size: 16px;"
                                                class="float-end badge bg-success trending_tag">Complete</label>
                                        @else
                                            <label for="" style="font-size: 16px;"
                                                class="float-end badge bg-danger trending_tag">Pending</label>
                                        @endif
                                    </h2>
                                </div>
                                <hr>
                                <p>
                                    {!! $item->condition !!}
                                </p>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="me-3 ">Repair Cost : Ksh {{ $item->total_price }}</label>
                                        <br>
                                        <label class="me-3">Part Cost : Ksh 500 </label>   
                                    </div>
                                     <div class="col-md-8">
                                        @foreach ($ratings as $item )
                                        <small>Reviewed on {{$item->created_at->format('d M Y')}}</small><br>
                                        <span>by</span>
                                        <label for="">{{ $item->user->name.' '.$item->user->lname }}</label>
                                        <p>
                                           {{$item->user_review}}
                                        </p>
                                        @endforeach

                                        @php $ratenum = number_format($rating_value) @endphp
                                        <div class="rating">
                                            @for($i=1; $i<=$ratenum; $i++)
                                            <i class="fa-solid fa-star checked"></i>
                                            @endfor
                                            @for($j = $ratenum+1; $j <= 5; $j++)
                                            <i class="fa-solid fa-star"></i>
                                            @endfor
                                                    <span class="fw-bold fst-italic">
                                                        @if($ratings->count() > 0)
                                                        {{$ratings->count()}} Ratings
                                                        @else
                                                        No Rating
                                                         @endif
                                                    </span>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row py-3">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-link" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Write A Review</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
