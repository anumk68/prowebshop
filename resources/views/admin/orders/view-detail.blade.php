@extends('admin.layout.app')

@section('content')
    <div class="container custom-width mt-4 mb-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Order #{{ $order->id }} Details</h4>
            </div>
            <div class="card-body">

                {{-- User Info --}}
                <h5 class="mb-3 border-bottom pb-2">User Information</h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-6"><strong>Name:</strong> {{ $order->user->name ?? 'Guest' }}</div>
                    <div class="col-md-6"><strong>Email:</strong> {{ $order->user->email ?? '-' }}</div>
                    <div class="col-md-6"><strong>Phone:</strong> {{ $order->phone }}</div>
                    <div class="col-md-6"><strong>Address:</strong> {{ $order->address }}, {{ $order->city }} -
                        {{ $order->pincode }}</div>
                </div>

                {{-- Order Info --}}
                <h5 class="mb-3 border-bottom pb-2">Order Information</h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-6"><strong>Payment Method:</strong><b> {{ Str::upper($order->payment_method) }}</b>
                    </div>
                    <div class="col-md-6"><strong>Payment Status:</strong> <span
                            class="badge bg-{{ $order->payment_status == 'Paid' ? 'success' : 'warning' }}">{{ ucfirst($order->payment_status) }}</span>
                    </div>
                    <div class="col-md-6"><strong>Total Amount:</strong> <span
                            class="text-success">${{ number_format($order->total_amount, 2) }}</span></div>
                    <div class="col-md-6"><strong>Order Status:</strong> <span
                            class="badge bg-secondary">{{ ucfirst($order->status) }}</span></div>
                    <div class="col-md-6">
                        <strong>Created At:</strong> {{ $order->created_at->format('d M Y h:i A') }}
                    </div>

                </div>

                {{-- Ordered Items --}}
                <h5 class="mb-3 border-bottom pb-2">Ordered Items</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Package Name</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-end"> Price</th>
                                <th class="text-end">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($order->items as $item)
                                <tr>
                                    <td>
                                        @if ($item->package)
                                            {{ $item->package->typess->type ?? '' }} - {{ $item->package->title ?? '' }}
                                        @else
                                            <span class="text-danger">Package not found</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-end">${{ number_format($item->price / $item->quantity, 2) }}</td>
                                    <td class="text-end">${{ number_format($item->price, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="text-end">
                    <a href="{{ route('orders.list') }}" class="btn btn-outline-secondary mt-4">← Back to Orders</a>
                </div>
            </div>
        </div>
    </div>
@endsection
