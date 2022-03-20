@extends('layouts.app')

{{-- @section('title')
Outlet's Login
@endsection --}}

@section('content')
<div class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="../../index2.html"><b>Outlet's</b>ELECTRO</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">{{ Auth::user()->name }}</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="{{ asset('assets/uploads/users/' . Auth::user()->image) }}" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="POST" action="{{ route('password.confirm') }}">
      @csrf
      <div class="input-group">
        {{-- <input id="email" type="hidden" name="email" value="{{Auth::user()->email}}"> --}}
        <input  id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="password">

        <div class="input-group-append">
          <button type="submit" class="btn">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="{{ route('logout') }}"  onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">Or sign in as a different user</a>
    <form id="logout-form" action="{{ route('logout') }}"   method="POST" class="d-none">
      @csrf
  </form>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2014-2021 <b><a href="#GodIsAble" class="text-black">AdminLTE.io</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->
</div>
@endsection
