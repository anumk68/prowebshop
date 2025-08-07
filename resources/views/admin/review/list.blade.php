@extends('admin.layout.app')

@section('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="container custom-width mt-3 mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="bi bi-chat-dots"></i> Review List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Name</th>
                                        <th>Rating</th>
                                        <th>Review</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->rating }}</td>
                                            <td style="width: 200px;">
                                                @php
                                                    $words = explode(' ', $data->review);
                                                    $chunks = array_chunk($words, 5);
                                                @endphp

                                                @foreach ($chunks as $chunk)
                                                    {{ implode(' ', $chunk) }}<br>
                                                @endforeach
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.review.delete', $data->id) }}"
                                                    onclick="return confirm('Are you sure you want to delete this review?');">
                                                    <button class="btn btn-sm btn-danger delete-btn">Delete</button>
                                                </a>
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

@section('scripts')
    <!-- jQuery + DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#dataTable')) {
                $('#dataTable').DataTable({
                    responsive: true,
                    "pageLength": 10,
                    "ordering": true,
                    "lengthChange": false
                });
            }
        });
    </script>
@endsection
