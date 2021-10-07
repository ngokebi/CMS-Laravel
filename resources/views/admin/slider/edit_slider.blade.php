{{-- Edit Brand --}}

@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

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
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><strong>Edit Slider</strong></div>
                    <div class="card-body">
                        <form action="{{ url('slider/update/' . $sliders->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title:</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    aria-describedby="emailHelp" value="{{ $sliders->title}}">
                                @error('title')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Dsecription:</label>
                                <textarea name="description" class="form-control" id="description"
                                    rows="10">{{$sliders->description}}</textarea>
                                @error('description')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Slider Image:</label>
                                <input type="file" name="image" class="form-control" id="image"
                                    aria-describedby="emailHelp" value="{{$sliders->image}}">
                                @error('image')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <img src="{{ asset($sliders->image)}}" width="500px" height="300px">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-warning" href="{{ route('home.slider') }}">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection




