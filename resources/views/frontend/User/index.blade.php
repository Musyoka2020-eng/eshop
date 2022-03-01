@extends('layouts.userfront')
@section('title')
    {{ Auth::user()->name . ' ' . Auth::user()->lname }}
@endsection
@section('content')
    @include('layouts.inc.userdata.dashboard')
@endsection
