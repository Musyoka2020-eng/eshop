@extends('layouts.userfront')
@section('content')
    <div class="card shadow">
        <div class="card-header bg-info">
            <h3>My profile</h3>
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" src="{{ asset('assets/uploads/users/' . Auth::user()->image) }}"
                        width="150" height="150" alt="Image not found"
                        onerror="this.onerror=null;this.src={{ asset('assets/images/altimg.jpg') }};" />
                    <span> Name: <span
                            class="font-weight-bold">{{ Auth::user()->name . ' ' . Auth::user()->lname }}</span></span>
                    <span> Email: <span class="text-black-50"> {{ Auth::user()->email }}</span> </span>
                    <span> Country: <span class="text-black-50"> {{ Auth::user()->city }}-
                            {{ Auth::user()->country }}</span></span>
                </div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back">
                            {{-- <i class="fa-solid fa-long-arrow-left mr-2 mb-2"></i> --}}
                            <a href="{{ url('user') }}" class="btn btn-primary"><i class="fa-solid fa-circle-left"></i>
                                Back to home
                            </a>
                        </div>
                        <h6 class="text-right mr-4">Edit Profile</h6>
                    </div>
                    <form action="{{ url('updateprofile') }}" method="POST" accept-charset="utf-8"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <input type="text" name="fname" placeholder="Enter First Name"
                                    value="{{ Auth::user()->name }}" class="form-control fname">
                                <span id="fname-error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="lname" placeholder="Enter Last Name"
                                    value="{{ Auth::user()->lname }}" class="form-control lname">
                                <span id="lname-error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <input type="email" name="email" placeholder="Enter Your Email"
                                    value="{{ Auth::user()->email }}" class="form-control email">
                                <span id="email-error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" placeholder="Enter Phone Number"
                                    value="{{ Auth::user()->phone }}" class="form-control phone">
                                <span id="phone-error" class="text-danger"></span>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <input type="text" name="address1" placeholder="Enter Address 1"
                                    value="{{ Auth::user()->address1 }}" class="form-control address1">
                                <span id="address1-error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="address2" placeholder="Enter Address 2"
                                    value="{{ Auth::user()->address2 }}" class="form-control address2">
                                <span id="address2-error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <input type="text" name="city" placeholder="Enter City Name"
                                    value="{{ Auth::user()->city }}" class="form-control city">
                                <span id="city-error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="state" placeholder="Enter State Name"
                                    value="{{ Auth::user()->state }}" class="form-control state">
                                <span id="state-error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <input type="text" name="country" placeholder="Enter Country Name"
                                    value="{{ Auth::user()->country }}" class="form-control country">
                                <span id="country-error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="pincode" placeholder="Enter Pin Code"
                                    value="{{ Auth::user()->pincode }}" class="form-control pincode">
                                <span id="pincode-error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control-file image">
                            </div>
                        </div>
                        <div class="mt-5 text-left"><button class="btn btn-primary profile-button" type="submit">Save
                                Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
