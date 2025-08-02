@extends('frontend.layout.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        section.checkout_cart_main .cart-item {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding: 20px 0;
            flex-wrap: wrap;
        }
        .cart_padding {
    justify-content: center !important;
}
        section.checkout_cart_main .item-image {
            width: 100px;
            margin-right: 20px;
        }
        section.checkout_cart_main .item-image img {
            width: 100px;
            height: auto;
            object-fit: cover;
        }
        section.checkout_cart_main .item-details {
            flex: 2;
        }
        section.checkout_cart_main .item-details h4 {
            font-size: 16px;
            margin-bottom: 5px;
        }
        section.checkout_cart_main .item-details .price {
            font-size: 14px;
        }
        section.checkout_cart_main .old-price {
            color: #999;
            text-decoration: line-through;
            margin-right: 10px;
        }
        section.checkout_cart_main .new-price {
            color: orange;
            font-weight: bold;
        }
        section.checkout_cart_main .qty-control {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #444;
            color: #fff;
            border-radius: 5px;
            padding: 5px 10px;
            margin: 0 20px;
        }
        section.checkout_cart_main .qty-control span {
            padding: 0 10px;
            cursor: pointer;
        }
        section.checkout_cart_main .item-price {
            font-weight: bold;
            color: #000;
            margin-right: 20px;
        }
        section.checkout_cart_main .remove-icon {
            margin-left: auto;
            font-size: 20px;
            color: #999;
            transition: color 0.3s;
        }
        section.checkout_cart_main .remove-icon:hover {
            color: red;
        }
        section.checkout_cart_main .cart-footer {
            margin-top: 20px;
            display: flex;
            justify-content: flex-start;
        }
        @media screen and (max-width: 768px) {
            section.checkout_cart_main .cart-item {
                flex-direction: column;
                align-items: flex-start;
            }
            section.checkout_cart_main .qty-control {
                margin: 10px 0;
            }
            section.checkout_cart_main .item-price {
                margin: 10px 0;
            }
        }
        section.cart_proceed .cart-total-container {
            display: flex;
            justify-content: flex-end;
            padding: 40px 20px;
        }
        section.cart_proceed .cart-totals {
            background: #eee;
            padding: 20px;
            width: 450px;
            border-radius: 4px;
        }
        section.cart_proceed .cart-totals h3 {
            margin-bottom: 20px;
            font-size: 20px;
            color: #333;
        }
        section.cart_proceed .totals-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        section.cart_proceed .totals-table td {
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
            font-size: 14px;
            color: #333;
        }
        section.cart_proceed .totals-table td:last-child {
            text-align: right;
        }
        section.cart_proceed .totals-table td input[type="radio"] {
            margin-right: 5px;
        } 
        section.cart_proceed .btn-checkout {
            color: #fff;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            section.cart_proceed .cart-total-container {
                justify-content: center;
            }
        }
    </style>
    <section class="checkout_cart_main">
        <div class="container">
            @php $subtotal = 0; @endphp
            @if ($carts->isEmpty())
                <div class="text-center py-5">
                    <i class="bi bi-cart-x" style="font-size: 60px; color: #ccc;"></i>
                    <h4 class="mt-3">Your cart is empty</h4>
                    <p class="text-muted">Looks like you haven’t added anything yet.</p>
                </div>
            @else
                @foreach ($carts as $cart)
                    @php
                        $amountParts = explode(' ', $cart->amount);
                        $firstPrice = $amountParts[0] ?? '$0';
                        $secondPrice = $amountParts[1] ?? null;
                        $unitPrice = (float) filter_var(
                            $firstPrice,
                            FILTER_SANITIZE_NUMBER_FLOAT,
                            FILTER_FLAG_ALLOW_FRACTION,
                        );
                        $lineTotal = $unitPrice * $cart->quantity;

                        $subtotal += $lineTotal;
                    @endphp
                    <div class="cart-item">
                        <div class="item-image">
                            <img src="{{ asset('public/storage/' . $cart->image) }}" alt="package image">
                        </div>
                        <div class="item-details">
                            <h4>{{ $cart->title }}</h4>
                            <h4>{{ $cart->type }}</h4>
                            <div class="price">
                                @if ($secondPrice)
                                    <span class="old-price">{{ $secondPrice }}</span>
                                @endif
                                <span class="new-price">{{ $firstPrice }}</span>
                            </div>
                        </div>
                        <div class="qty-control">
                            <span class="qty-decrease">−</span>
                            <span>{{ $cart->quantity }}</span>
                            <span class="qty-increase">+</span>
                        </div>
                        <input type="hidden" name="package_id" value="{{ $cart->package_id }}">
                        <div class="item-price">${{ number_format($lineTotal, 2) }}</div>
                        <form method="POST" action="{{ route('cart.remove') }}"
                            onsubmit="return confirm('Are you sure you want to remove this item?');">
                            @csrf
                            <input type="hidden" name="package_id" value="{{ $cart->package_id }}">

                            <button type="submit" class="remove-icon text-danger border-0 bg-transparent p-0"
                                style="cursor: pointer;">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            @endif
            <div class="cart-footer cart_padding">
                <a href="{{ route('/') }}"><button class="btn_theme">CONTINUE SHOPPING</button></a>
            </div>
        </div>
    </section>
        <section class="cart_proceed">
        <div class="container">
            <div class="cart-total-container">
                <div class="cart-totals">
                    <h3>Cart totals</h3>
                    @php
                        $shipping = 0;
                        $total = $subtotal + $shipping;
                    @endphp
                    <table class="totals-table">
                        <tr>
                            <td>Subtotal</td>
                            <td>${{ number_format($subtotal, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>
                                <label>
                                    <input type="radio" name="shipping" checked> Free Shipping
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>${{ number_format($total, 2) }}</td>
                        </tr>
                    </table>
                    <form action="{{ route('checkout') }}" method="get">
                        @csrf
                        <button type="submit" class="btn_theme btn-checkout ">PROCEED TO CHECKOUT</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".qty-control").forEach(function (control) {
                const minusBtn = control.querySelector(".qty-decrease");
                const plusBtn = control.querySelector(".qty-increase");
                const quantityDisplay = control.querySelector("span:nth-child(2)");
                const itemElement = control.closest(".cart-item");
                const packageId = itemElement.querySelector("input[name='package_id']").value;
                const priceDisplay = itemElement.querySelector(".item-price");
                function updateQuantity(newQty) {
                    fetch("{{ route('cart.updateQty') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']")
                                .getAttribute("content")
                        },
                        body: JSON.stringify({
                            package_id: packageId,
                            quantity: newQty
                        })
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                quantityDisplay.textContent = newQty;

                                const unitPriceRaw = itemElement.querySelector(".new-price")
                                    .textContent;
                                const unitPrice = parseFloat(unitPriceRaw.replace(/[^0-9.]/g, ""));
                                const total = unitPrice * newQty;
                                priceDisplay.textContent = `$${total.toFixed(2)}`;

                                refreshCartTotals();
                            } else {
                                alert(data.error || "Failed to update quantity.");
                            }
                        });
                }
                minusBtn.addEventListener("click", () => {
                    let currentQty = parseInt(quantityDisplay.textContent);
                    if (currentQty > 1) updateQuantity(currentQty - 1);
                });

                plusBtn.addEventListener("click", () => {
                    let currentQty = parseInt(quantityDisplay.textContent);
                    updateQuantity(currentQty + 1);
                });
            });
            function refreshCartTotals() {
                fetch("{{ route('cart.totals') }}")
                    .then(res => res.json())
                    .then(data => {
                        if (data.subtotal && data.total) {
                            document.querySelector(".totals-table tr:nth-child(1) td:nth-child(2)")
                                .textContent = `${data.subtotal}`;
                            document.querySelector(".totals-table tr:nth-child(3) td:nth-child(2)")
                                .textContent = `${data.total}`;
                        }
                    });
            }
        });
    </script>
@endsection