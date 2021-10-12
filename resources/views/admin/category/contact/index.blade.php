{{--  Admin Contact Page --}}

@extends('admin.admin_master')

@section('admin')
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <div class="card">
                <a href="{{route('new.contact')}}" class="btn btn-outline-secondary">

                    New Contact</a>
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

                        <div class="card-header"><strong>Contact</strong></div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" style="width: 20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $contact->address }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>
                                                <a href="{{ url('contact/edit/' . $contact->id) }}"
                                                    class="btn btn-primary">Edit</a>

                                                <a href="{{ url('contact/delete/' . $contact->id) }}"
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

@endsection
