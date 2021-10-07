{{-- New Slider Page --}}

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
                        <div class="card-header"><strong>Edit About</strong></div>
                        <div class="card-body">
                            <form action="{{ url('about/update/' . $home_about->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title:</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{$home_about->title}}">
                                    @error('title')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Short Description:</label>
                                    <textarea name="short_description" class="form-control" id="short_description"
                                        rows="5">{{$home_about->short_description}}</textarea>
                                    @error('short_description')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="long_description" class="form-label">Long Description:</label>
                                    <textarea name="long_description" class="form-control" id="long_description"
                                        rows="7">{{$home_about->long_description}}</textarea>
                                    @error('long_description')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-warning" href="{{ route('home.about') }}">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
