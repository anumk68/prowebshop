@extends('admin.layout.app')

@section('styles')
    <style>
        /* Add horizontal line between rows */
        #dataTable tbody tr {
            border-bottom: 2px solid #dee2e6;
        }

        #dataTable tbody tr:last-child {
            border-bottom: none;
        }
    </style>
@endsection

@section('content')
    <div class="container custom-width mt-3 mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Contact Us List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone no.</th>
                                        <th>Service</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody id="cate">
                                    @foreach ($contactus as $contact)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ $contact->services }}</td>
                                            <td>
                                                <form action="{{ route('contact.delete', $contact->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
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
