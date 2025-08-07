@extends('admin.layout.app')

@section('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4><i class="bi bi-gift"></i> Offer List</h4>
            <a href="{{ route('admin.offers.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Add Offer
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center" id="offerTable">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Package</th>
                        <th>Title</th>
                        <th>Discount</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Validity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($offers as $index => $offer)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $offer->package->title ?? 'N/A' }}</td>
                            <td>{{ $offer->title }}</td>
                            <td>

                                    {{ $offer->discount }}%

                            </td>
                            <td>{{ $offer->start_date ?? '-' }}</td>
                            <td>{{ $offer->end_date ?? '-' }}</td>
                            <td>
                                @if ($offer->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $today = \Carbon\Carbon::today();
                                    $start = \Carbon\Carbon::parse($offer->start_date);
                                    $end = \Carbon\Carbon::parse($offer->end_date);
                                @endphp

                                @if ($today->lt($start))
                                    <span class="badge bg-warning">Upcoming</span>
                                @elseif($today->gt($end))
                                    <span class="badge bg-danger">Expired</span>
                                @else
                                    <span class="badge bg-success">Valid</span>
                                @endif
                            </td>


                            <td>
                                <a href="{{ route('admin.offers.edit', $offer->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>

                                <form action="{{ route('admin.offers.destroy', $offer->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this offer?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">No offers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- jQuery + DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#offerTable').DataTable({
                responsive: true,
                "pageLength": 10,
                "ordering": true,
                "lengthChange": false
            });
        });
    </script>
@endsection
