@extends('layouts.admin')
@section('title')
    Admin:Change_Role
@endsection

@section('content')
<div class="col-md-4">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                <h5 class="">User Role</h5>
                <p class="mb-0">You can change any user role here</p>
              </div>
              <div class="card-body">
                  {{-- @foreach ($roleuse as $items ) --}}
                    <form role="form text-left" action="{{ url('change_role/'.$roleuse->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="role_as" id="Client" value="0" {{$roleuse->role_as =="0" ? 'checked':''}}>
                        <label class="custom-control-label" for="client">Client</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="role_as" id="Admin" value="1" {{$roleuse->role_as =="1" ? 'checked':''}}>
                        <label class="custom-control-label" for="admin">Admin</label>
                      </div>
                    <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Change Role</button>
                  </div>
                </form>
                {{-- @endforeach --}}
              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                  Changing the user role can grant more previledges or revoke some previledges
                  <a href="javascript:;" class="text-info text-gradient font-weight-bold">Read More..</a>
                </p>
              </div>
            </div>
          </div>
    </div>
    @endsection