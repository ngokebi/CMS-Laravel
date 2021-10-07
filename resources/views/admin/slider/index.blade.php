{{-- Slider Page --}}

@extends('admin.admin_master')

@section('admin')


<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <div class="card">
                <a href="{{ route('new.slider') }}" class="btn btn-outline-secondary">
                    Add Slider</a>
            </div>
        </div>
    </div>
</div>

<br>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        @if (session('success'))
                            {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close"></button>
                            </div> --}}
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i>{{ session('success') }}</i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card-header"><strong>All Slider</strong></div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col" style="width: 20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <th scope="row">{{ $sliders->firstItem() + $loop->index }}</th>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ substr($slider->description, 0, 250) }}</td>
                                            <td><img src="{{ asset($slider->image) }}" style="height: 70px; width:100px;">
                                            </td>
                                            <td>
                                                <a href="{{ url('slider/edit/' . $slider->id) }}"
                                                    class="btn btn-primary">Edit</a>

                                                <a href="{{ url('slider/delete/' . $slider->id) }}"
                                                    onclick="return confirm('Are you sure you want to delete')"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $sliders->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> Add Brand </div>
                        <div class="card-body">
                            <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="brand_name" class="form-label">Brand Name:</label>
                                    <input type="text" name="brand_name" class="form-control" id="brand_name">
                                    @error('brand_name')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="brand_image" class="form-label">Brand image:</label>
                                    <input type="file" name="brand_image" class="form-control"  id="brand_image" style="margin: 0%">
                                    @error('brand_image')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </form>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <br>

@endsection

