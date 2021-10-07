{{-- Admin Change Password --}}

@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <h4><strong>Profile Information</strong></h4>
            <p><small>Update your account's profile information and email address.</small></p>
            <br>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
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
                            <form action="{{ route('update.profile') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="{{ $user->name }}">
                                    @error('name')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="text" name="email" class="form-control" id="email"
                                        value="{{ $user->email }}">
                                    @error('email')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary" style="float: right">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br><br>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"> Edit Profile Image </div>
                        <div class="card-body">
                            <form action="{{route('update.picture')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{asset(Auth::user()->profile_photo_path)}}">
                                <div class="mb-3">
                                    <img src="{{asset(Auth::user()->profile_photo_path)}}">
                                </div>
                                <div class="mb-3">
                                    <label for="profile_photo" class="form-label">Profile image:</label>
                                    <input type="file" name="profile_photo" class="form-control" id="profile_photo"
                                        value="">
                                    @error('profile_photo')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <img src="">
                                </div>
                                <button type="submit" class="btn btn-primary" style="float: right">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
