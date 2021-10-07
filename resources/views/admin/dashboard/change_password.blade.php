{{-- Admin Change Password --}}

@extends('admin.admin_master')

@section('admin')


<div class="py-12">
    <div class="container">
        <h4><strong>Update Password</strong></h4>
        <p><small>Ensure your account is using a long, random password to stay secure.</small></p>
        <br>
        @if(session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><strong>Change Password</strong></div>
                    <div class="card-body">
                        <form action="{{ route('pass.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password:</label>
                                <input type="password" name="current_password" class="form-control" id="current_password">
                                @error('current_password')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password:</label>
                                <input type="password" name="password" class="form-control" id="password">
                                @error('password')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                                @error('password_confirmation')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" style="float: right">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
