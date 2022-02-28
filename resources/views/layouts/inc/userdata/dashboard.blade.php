@extends('layouts.userfront')
<div class="row">
    <div class="shadow card bg-primary col-md-2 m-3 mt-3">
        <div class="card-body ">
            <h5 class="card-title"> <span><i class="fa-solid fa-user fa-xl"></i></span> My profile</h5>
            <p class="card-text">{{Auth::user()->name.' '.Auth::user()->lname}}
                <br>
            @php
            $type = $typeuser->role_as
            @endphp
            @if($type == 0)
            User</p>
            @elseif($type == 1)
            Admin</p>
            @else
            Invalid</p>
            @endif
        </div>
    </div>
    <div class="shadow card bg-success col-md-2 m-3 mt-3">
        <div class="card-body">
            <h5 class="card-title">
                <span><i class="fa-solid fa-file-invoice fa-xl"></i></span> Purchases
            </h5>
            <p class="card-text">
                Complete: <span>{{$comporders->count()}}</span>
                <br>
                Pending: <span>{{$pendorders->count()}}</span>
            </p>
        </div>
    </div>
    <div class="shadow card bg-success col-md-2 m-3 mt-3">
        <div class="card-body">
            <h5 class="card-title">
                <span> <i class="fa-solid fa-wallet fa-xl"></i></span> Wallet
            </h5>
            <p class="card-text">
                Balance:<br> Ksh. {{$cash}}
            </p>
        </div>
    </div>
    <div class="shadow card bg-warning col-md-2 m-3 mt-3">
        <div class="card-body">
            <h5 class="card-title">
                <span> <i class="fa-solid fa-toolbox fa-xl"></i></span> My repairs
            </h5>
            <p class="card-text">
                Complete: <span></span>
                <br>
                Pending: <span></span>
            </p>
        </div>
    </div>
    <div class="shadow card bg-warning col-md-2 m-3 mt-3">
        <div class="card-body">
            <h5 class="card-title"><span><i class="fa-solid fa-list-check fa-xl"></i></span> Complete</h5>
            <p class="card-text">Total: 0</p>
        </div>
    </div>
</div>
<br>
<hr>
