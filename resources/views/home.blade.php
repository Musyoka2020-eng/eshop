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
                <div class="row">
                    <div class="lockscreen-image">
                        <img src="{{ asset('assets/uploads/users/' . Auth::user()->image) }}" alt="User Image">
                    </div>
                </div>
                <!-- /.lockscreen-image -->
            </div>
            <!-- /.lockscreen-item -->
            <div class="help-block text-center mt-5">
                Welcome to Outlet's Electronics
            </div>
            <div class="text-center">
                @auth
                    {{-- // user logged in --}}
                    @if (Auth::user()->role_as === 1)
                        <a href="{{ url('dashboard') }}">Click here to go to admin dashboard</a>
                    @elseif (Auth::user()->role_as === 0)
                        <a href="{{ url('user') }}">Click here to view your user dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Please login Or register to use our services</a>
                    @endif
                @else
                    {{-- // not logged in --}}
                    <a href="{{ route('login') }}">Click here to start shopping</a>
                @endauth
                {{-- <a href="{{ route('logout') }}"  onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">Click here to start shopping</a>
    <form id="logout-form" action="{{ route('logout') }}"   method="POST" class="d-none">
      @csrf
  </form> --}}
            </div>
            <div class="lockscreen-footer text-center">
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> <b><a href="#GodIsAble" class="text-black">Steve Codes</a></b><br>
                All rights reserved
            </div>
        </div>
        <!-- /.center -->
    </div>
@endsection
