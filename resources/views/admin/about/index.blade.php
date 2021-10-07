{{-- About Page --}}

@extends('admin.admin_master')

@section('admin')

<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <div class="card">
                <a href="{{route('new.about')}}" class="btn btn-outline-secondary">
                    New About</a>
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

                        <div class="card-header"><strong>About</strong></div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Short Description</th>
                                        <th scope="col">Long Description</th>
                                        <th scope="col" style="width: 20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach ($home_about as $about)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $about->title }}</td>
                                            <td>{{ substr($about->short_description, 0, 250) }}</td>
                                            <td>{{ substr($about->long_description, 0, 250) }}</td>
                                            <td>
                                                <a href="{{ url('about/edit/' . $about->id) }}"
                                                    class="btn btn-primary">Edit</a>

                                                <a href="{{ url('about/delete/' . $about->id) }}"
                                                    onclick="return confirm('Are you sure you want to delete')"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

@endsection

