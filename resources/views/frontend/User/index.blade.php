@extends('layouts.userfront')
@section('title')
   {{Auth::user()->name.' '.Auth::user()->lname}}
@endsection
@include('layouts.inc.frontnavbar')
@section('content')
 @include('layouts.inc.userdata.userside')
@endsection
