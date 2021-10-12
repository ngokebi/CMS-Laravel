{{-- New Contact Page --}}

@extends('admin.admin_master')

@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header"><strong>New Contact</strong></div>
                        <div class="card-body">
                            <form action="{{ route('add.contact') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address:</label>
                                    <textarea name="address" class="form-control" id="address"
                                        rows="5"></textarea>
                                    @error('address')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number:</label>
                                    <input type="text" name="phone" class="form-control" id="phone">
                                    @error('phone')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="text" name="email" class="form-control" id="email">
                                    @error('email')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-warning" href="{{ route('admin.contact') }}">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
