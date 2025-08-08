@extends('frontend.layout.app')
@section('content')
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-4 text-center">Checkout</h2>
            <div class="row">
                <div class="col-md-7">
                    <div class="card p-4 shadow-sm">
                        <h4 class="mb-3">Billing Details</h4>
                        <form action="{{ route('place.order', ['id' => $cartItems->first()->id]) }}" method="post">
                            @csrf
                            @php
                                $user = auth()->guard('userWeb')->user();
                            @endphp
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text" name="full_name" id="full_name" value="{{ $user->name }}"
                                    class="form-control" required disabled>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" name="email" id="email" value="{{ $user->email }}"
                                    class="form-control" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" name="phone" id="phone" class="form-control" maxlength="10"
                                    pattern="\d{10}" title="Phone number must be exactly 10 digits"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" required>
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" id="address" class="form-control" required rows="3">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" id="city" name="city" class="form-control"
                                    value="{{ old('city') }}" required>
                                @error('city')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pincode" class="form-label">Pincode</label>
                                <input type="text" name="pincode" id="pincode" class="form-control"
                                    value="{{ old('pincode') }}" maxlength="6" pattern="\d{6}"
                                    title="Enter a valid 6-digit pincode" required>
                                @error('pincode')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Payment Method</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="payment_method" value="cod"
                                        {{ old('payment_method', 'cod') === 'cod' ? 'checked' : '' }}>
                                    <label class="form-check-label">Cash on Delivery</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="payment_method" value="online"
                                        {{ old('payment_method') === 'online' ? 'checked' : '' }}>
                                    <label class="form-check-label">Online Payment</label>
                                </div>
                                @error('payment_method')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn_theme w-100">Place Order</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card p-4 shadow-sm">
                        <h4 class="mb-3">Order Summary</h4>
                        <ul class="list-group mb-3">
                            @foreach ($cartItems as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="d-flex">
                                        <img src="{{ asset('public/storage/' . $item->image) }}" alt="{{ $item->title }}"
                                            class="me-3 rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                        <div>
                                            <h6 class="my-0">{{ $item->type }}</h6>
                                            <p class="my-0 mb-1">{{ $item->title }}</p>
                                            <small class="text-muted">Qty: {{ $item->quantity }}</small>
                                        </div>
                                    </div>

                                    {{-- Show discounted and original prices --}}
                                    <div class="text-end">
                                        <span class="fw-semibold text-dark">
                                            ${{ number_format($item->discounted_price, 2) }}
                                        </span>

                                        @if ($item->offer && $item->offer->discount > 0)
                                            <span class="text-muted text-decoration-line-through ms-2">
                                                ${{ number_format($item->total_price, 2) }}
                                            </span>
                                            <span class="text-success fw-medium ms-2">
                                                ({{ $item->offer->discount }}% off)
                                            </span>
                                        @endif
                                    </div>
                                </li>
                            @endforeach

                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal</span>
                                <strong>${{ number_format($subtotal, 2) }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total</span>
                                <strong>${{ number_format($total, 2) }}</strong>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
