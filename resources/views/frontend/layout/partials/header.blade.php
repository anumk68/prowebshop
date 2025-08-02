@if (session('success') || session('error'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1100">
        <div class="toast align-items-center text-white {{ session('success') ? 'bg-success' : 'bg-danger' }} border-0"
            role="alert" aria-live="assertive" aria-atomic="true" id="sessionToast">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') ?? session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
<style>
    .mini-cart-dropdown {
        position: absolute;
        right: 0;
        top: 100%;
        width: 340px;
        background: #fff;
        border: 1px solid #eee;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        padding: 15px;
        border-radius: 8px;
        overflow: hidden;
        animation: fadeIn 0.3s ease-in-out;
        font-family: 'Segoe UI', sans-serif;
    }

    .mini-cart-items {
        max-height: 280px;
        overflow-y: auto;
        margin-bottom: 15px;
        padding: 0;
        list-style: none;
    }

    .mini-cart-item {
        display: flex;
        align-items: center;
        border-bottom: 1px solid #f1f1f1;
        padding: 10px 0;
    }

    .cart-thumb {
        position: relative;
        margin-right: 12px;
        flex-shrink: 0;
    }

    .cart-thumb img {
        width: 65px;
        height: 65px;
        object-fit: cover;
        border-radius: 6px;
        background-color: #f8f8f8;
    }

    .cart-qty {
        position: absolute;
        top: -6px;
        left: -6px;
        background: #333;
        color: #fff;
        font-size: 12px;
        padding: 2px 6px;
        border-radius: 50%;
        font-weight: bold;
    }

    .cart-details {
        flex: 1;
    }

    .cart-title {
        font-size: 15px;
        font-weight: 600;
        color: #222;
        margin-bottom: 4px;
        line-height: 1.3;
    }

    .prices {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .old-price {
        color: #999;
        font-size: 13px;
        text-decoration: line-through;
    }

    .new-price {
        color: #e53935;
        font-weight: bold;
        font-size: 15px;
    }

    .btn-checkout {
        display: block;
        background-color: #222;
        color: #fff;
        text-align: center;
        padding: 12px;
        border-radius: 4px;
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        transition: background-color 0.2s ease-in-out;
    }

    .btn-checkout:hover {
        background-color: #000;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<div class="top_header_main">
    <div class="container">
        <div class="top_header">
            <div class="row align-items-center">

                <div class="col-lg-5 col-md-12">
                    <div class="countdown">
                        Days :<span id="days">00</span>
                        Hour :<span id="hours">00</span>
                        Min :<span id="minutes">00</span>
                        Sec :<span id="seconds">00</span>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="text_top_header">
                        <p>New Year Flash Sale Offer
                            <span class="off_present">45% OFF</span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-2">

                    <div class="close-icon cross_top" onclick="closeHeader()">&times;</div>
                </div>
            </div>
        </div>
    </div>
</div>

<header>
    <nav>
        <div class="container">
            <div class="wrapper">
                <div class="logo">
                    <a href="{{ route('/') }}"><img src="{{ asset('public/frontend/img/prowebshop_logo_head.png') }}"
                            alt=""></a>
                </div>
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
                <input type="radio" name="slider" id="menu-btn">
                <input type="radio" name="slider" id="close-btn">
                <ul class="nav-links">
                    <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                    <li class="d-block d-lg-none">
                        <a href="{{ route('/') }}" {{ request()->routeIs('/') ? 'active' : '' }}>Home</a>
                    </li>
                    <li><a href="{{ route('about') }}" {{ request()->routeIs('about') ? 'active' : '' }}>About Us</a>
                    </li>
                    <li>
                        <a href="#" class="desktop-item">Web Services <i class="fa-solid fa-plus"></i></a>
                        <input type="checkbox" id="webServicesDrop">
                        <label for="webServicesDrop" class="mobile-item">Web Services <i class="fa-solid fa-plus"></i>
                        </label>

                        <ul class="drop-menu">
                            <li><a href="{{ route('php-laravel-website') }}" {{ request()->routeIs('php-laravel-website') ? 'active' : '' }}>PHP Laravel
                                    Website</a></li>
                            <li><a href="{{ route('react-java-website') }}" {{ request()->routeIs('react-java-website') ? 'active' : '' }}>React – Java
                                    Website</a></li>
                            <li><a href="{{ route('shopify-development') }}" {{ request()->routeIs('shopify-development') ? 'active' : '' }}>Shopify Website</a>
                            </li>
                            <li><a href="{{ route('custom-website-development') }}" {{ request()->routeIs('custom-website-development') ? 'active' : '' }}>Custom-development</a>
                            </li>
                            <li><a href="{{ route('webflow-development') }}" {{ request()->routeIs('webflow-development') ? 'active' : '' }}>Webflow Website</a>
                            </li>
                            <li><a href="{{ route('wix-website-development') }}" {{ request()->routeIs('wix-webstie-development') ? 'active' : '' }}>Wix Website</a>
                            </li>
                            <li><a href="{{ route('wordpress-website-development') }}" {{ request()->routeIs('wordpress-website-development') ? 'active' : '' }}>WordPress
                                    Website</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="desktop-item">Digital Marketing <i class="fa-solid fa-plus"></i></a>
                        <input type="checkbox" id="showDrop">
                        <label for="showDrop" class="mobile-item">Digital Marketing <i class="fa-solid fa-plus"></i>
                        </label>
                        <ul class="drop-menu">
                            <li><a href="{{ route('search-engine-optimization') }}">SEO Services</a></li>
                            <li><a href="{{ route('ppc-services') }}">PPC Services</a></li>
                            <li><a href="{{ route('smo-services') }}">SMO Services</a></li>
                            <li><a href="{{ route('email-marketing-service') }}">Email Marketing & Bulk
                                    Sms</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('graphic-devlopment') }}">Graphic</a></li>
                    <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                </ul>
                <div class="icons">
                    @php
                        use App\Models\Cart;
                        use App\Models\Package;

                        $user = auth()->guard('userWeb')->user();
                        $cartItems = collect();
                        $sessionCart = session()->get('cart', []);
                        $sessionCartItems = collect($sessionCart)->map(function ($item) {
                            $package = Package::find($item['package_id']);
                            if ($package) {
                                return (object) [
                                    'quantity' => $item['quantity'],
                                    'package' => (object) [
                                        'title' => $package->title,
                                        'amount' => $package->amount,
                                        'image' => $package->image,
                                    ],
                                ];
                            }
                            return null;
                        })->filter();
                        $cartItems = $cartItems->concat($sessionCartItems);
                        if ($user) {
                            $dbCartItems = Cart::where('user_id', $user->id)->with('package')->get();
                            $cartItems = $cartItems->concat($dbCartItems);
                        }
                        $count_cart = $cartItems->count();
                    @endphp

                    <a href="javascript:void(0);" class="cart-icon" id="cart-toggle">
                        <img src="{{ asset('public/frontend/img/cart.svg') }}" alt="">
                        <span id="cart-count" class="icons_zero">{{ $count_cart ?? 0}}</span>
                    </a>
                    <div class="mini-cart-dropdown" id="mini-cart" style="display: none;">
                        @if (!empty($cartItems) && count($cartItems) > 0)
                            <ul class="mini-cart-items">
                                @foreach ($cartItems as $cart)
                                    <li class="mini-cart-item">
                                        <div class="cart-thumb">
                                            <img src="{{ asset('public/storage/' . $cart->package->image) }}"
                                                alt="{{ $cart->package->title }}">
                                            {{-- <span class="cart-qty">{{ $cart->quantity }}x</span> --}}
                                        </div>
                                        <div class="cart-details">
                                            <div class="cart-title">{{ Str::limit($cart->package->title, 40) }}</div>
                                            <div class="prices">
                                                @php $prices = explode(' ', $cart->package->amount); @endphp
                                                @if (isset($prices[1]))
                                                    <span class="old-price">{{ $prices[1] }}</span>
                                                @endif
                                                <span class="new-price">{{ $prices[0] }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <a href="{{ route('cart') }}" class="btn-checkout">Cart</a>
                        @else
                            <div class="text-center py-4">
                                <p class="text-muted mb-0">🛒 Your cart is empty.</p>
                            </div>
                        @endif
                    </div>


                    @if (auth()->guard('userWeb')->check())
                        <div class="dropdown d-inline-block">
                            <a href="#" class="user-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i><span>
                                    {{ ucfirst(auth()->guard('userWeb')->user()->name) }}</span>

                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <form method="POST" action="{{ route('user.logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Sign Out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('user.login.get') }}" class="user-icon">
                            <i class="fas fa-user"></i> <span>Create Account</span>
                        </a>
                    @endif
                </div>

            </div>
        </div>
    </nav>
</header>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toastEl = document.getElementById('sessionToast');
        if (toastEl) {
            const toast = new bootstrap.Toast(toastEl, {
                delay: 2000
            });
            toast.show();
        }
    });
    document.addEventListener("DOMContentLoaded", function () {
        const cartToggle = document.getElementById("cart-toggle");
        const miniCart = document.getElementById("mini-cart");

        cartToggle.addEventListener("click", function (e) {
            e.stopPropagation();
            miniCart.style.display = miniCart.style.display === "block" ? "none" : "block";
        });

        document.addEventListener("click", function () {
            miniCart.style.display = "none";
        });

        miniCart.addEventListener("click", function (e) {
            e.stopPropagation();
        });
    });

</script>