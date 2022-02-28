@extends('layouts.userfront')
@include('layouts.inc.frontnavbar')
@section('content')
<div class="container py-5">
    <div class="card shadow">
        <div class="card-header text-center font-bold bg-primary">
            My Profile
            <a href="{{url('user')}}" class="btn btn-warning float-end">Back</a>
        </div>
        <div class="card-body">
            <h6 class="card-title alert alert-danger">Please input correct details</h6>
            <form action="{{url('updateprofile')}}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="">First Name</label>
                        <input type="text" name="fname" placeholder="Enter First Name" value="{{ Auth::user()->name}}"
                            class="form-control fname">
                        <span id="fname-error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="">Last Name</label>
                        <input type="text" name="lname" placeholder="Enter Last Name" value="{{ Auth::user()->lname}}"
                            class="form-control lname">
                        <span id="lname-error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Enter Your Email" value="{{ Auth::user()->email}}"
                            class="form-control email">
                        <span id="email-error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="">Phone Number</label>
                        <input type="text" name="phone" placeholder="Enter Phone Number"
                            value="{{ Auth::user()->phone}}" class="form-control phone">
                        <span id="phone-error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="">Address 1</label>
                        <input type="text" name="address1" placeholder="Enter Address 1"
                            value="{{ Auth::user()->address1}}" class="form-control address1">
                        <span id="address1-error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="">Address 2</label>
                        <input type="text" name="address2" placeholder="Enter Address 2"
                            value="{{ Auth::user()->address2}}" class="form-control address2">
                        <span id="address2-error" class="text-danger"></span>

                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="">City</label>
                        <input type="text" name="city" placeholder="Enter City Name" value="{{ Auth::user()->city}}"
                            class="form-control city">
                        <span id="city-error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="">State</label>
                        <input type="text" name="state" placeholder="Enter State Name" value="{{ Auth::user()->state}}"
                            class="form-control state">
                        <span id="state-error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="">Country</label>
                        <input type="text" name="country" placeholder="Enter Country Name"
                            value="{{ Auth::user()->country}}" class="form-control country">
                        <span id="country-error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="">Pin Code</label>
                        <input type="text" name="pincode" placeholder="Enter Pin Code"
                            value="{{ Auth::user()->pincode}}" class="form-control pincode">
                        <span id="pincode-error" class="text-danger"></span>
                    </div>
                </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-outline-success float-end">Update</button>
        </div>
    </form>
    </div>
</div>
