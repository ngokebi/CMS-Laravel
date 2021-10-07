{{--  Admin Contact Message Page --}}

@extends('admin.admin_master')

@section('admin')
<h4><strong>Messages</strong></h4>
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

                        <div class="card-header"><strong> All Messages</strong></div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Message</th>
                                        <th scope="col" >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach ($contact_message as $message)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $message->name }}</td>
                                            <td>{{ $message->subject }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td>{{ $message->message }}</td>
                                            <td>
                                                <a href="{{ url('contactmessage/delete/' . $message->id) }}"
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
