@extends('admin.layout.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
    <div class="container custom-width mt-3 mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>User Name</th>
                                        {{-- <th>Package(s)</th> --}}
                                        <th>Phone</th>
                                        <th>City / Pincode</th>
                                        <th>Amount</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->user->name ?? 'Guest' }}</td>
                                            <td>{{ $order->phone }}</td>
                                            <td>{{ $order->city }}, {{ $order->pincode }}</td>
                                            <td>${{ number_format($order->total_amount, 2) }}</td>
                                            <td>
                                                @if ($order->payment_method == 'online')
                                                <span class="badge bg-success">{{ ucfirst($order->payment_method) }}</span><br>
                                             <small>   <b>{{ ucfirst($order->payment_status) }}</b>
                                                    @else
                                                     <span class="badge bg-info">{{ ucfirst($order->payment_method) }}</span><br>
                                              <small>  <b>{{ ucfirst($order->payment_status) }}</b></small>
                                                @endif
                                            </td>
                                            <td><span class="badge bg-warning">{{ ucfirst($order->status) }}</span></td>
                                            <td>

                                                <a href="{{ route('order.details', $order->id) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </a>


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($orders->isEmpty())
                                <p class="text-center text-muted">No orders found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($order->items as $item)
        <div class="modal fade" id="itemModal{{ $item->id }}" tabindex="-1"
            aria-labelledby="itemModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="itemModalLabel{{ $item->id }}">
                            Package Details - {{ $item->package->title ?? 'N/A' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Type:</strong> {{ $item->package->typess->type ?? '-' }}</p>
                        <p><strong>Title:</strong> {{ $item->package->title ?? '-' }}</p>
                        <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
                        <p><strong>Price:</strong> ${{ number_format($item->price, 2) }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
