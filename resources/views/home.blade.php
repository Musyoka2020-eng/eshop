@extends('layouts.app')

@section('title')
Outlet's Login
@endsection

@section('content')
<div class="container top-50">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card  bg-primary">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body fw-bolder">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
