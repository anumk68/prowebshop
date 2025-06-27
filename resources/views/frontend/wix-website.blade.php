@extends('frontend.layout.app')

@section('content')
    <section class="banner_about_us py_8" style="background-image: url({{ asset('public/frontend/img/wix_banner.png') }});">
        <div class="container">
            <div class="row">
                <div class="text_about_us">
                    <h1>Top-Tier Wix Website Development Services</h1>
                    <p>Boost your online presence with custom, high-quality Wix websites from ProWebShop. Our expert
                        developers
                        craft sleek, responsive, and performance-driven sites tailored to your business needs.</p>
                    <div class="banner_btn_services">
                        <a href="{{route('contact.us')}}">
                        <button class="btn_theme"> Book Free Consultation</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shopify_project py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2>Select the Package That Fits You Best</h2>
                <p>Website Design Innovation provides various packages for WordPress development. Our packages aim to offer
                    you
                    the utmost flexibility while fulfilling your website needs.</p>
            </div>
            <div class="row">

                @foreach ($wix as $web)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="under_shopify">
                            <div class="img_shopify">
                                <img src="{{ asset('public/storage/' . $web->image) }}" alt="">
                            </div>
                            <div class="under_content_shopify">
                                <h4>{{ $web->title }}</h4>
                                @php

                                    $amounts = explode(' ', $web->amount);
                                    $firstAmount = $amounts[0] ?? '';
                                    $secondAmount = $amounts[1] ?? '';
                                @endphp

                                <p class="price">

                                    <span>{{ $firstAmount }}</span>
                                    @if ($secondAmount)
                                        <span><del>{{ $secondAmount }}</del></span>
                                    @endif
                                </p>

                                <div style="max-height: 200px; overflow-y: auto; padding-right: 10px;"
                                    class="custom-scrollbar">
                                    <ul style="list-style: none; padding-left: 0; margin: 0;">
                                        @foreach (preg_split('/\r\n|\r|\n/', $web->description) as $feature)
                                            @php
                                                $cleanFeature = trim(
                                                    preg_replace(
                                                        '/\s+/',
                                                        ' ',
                                                        strip_tags(
                                                            html_entity_decode($feature, ENT_QUOTES | ENT_HTML5),
                                                        ),
                                                    ),
                                                );
                                            @endphp
                                            @if ($cleanFeature !== '')
                                                <li style="display: flex; align-items: center; margin-bottom: 6px;">
                                                    <i class="fa-solid fa-check" style="margin-right: 6px;"></i>
                                                    <span style="color: black;">{{ $cleanFeature }}</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                                @php
                                    $user = auth()->guard('userWeb')->user();
                                    $cartItem = null;

                                    if ($user) {
                                        $cartItem = App\Models\Cart::where('user_id', $user->id)
                                            ->where('package_id', $web->id)
                                            ->first();
                                    }
                                @endphp

                                <div id="package" class="package-wrapper">
                                    @unless ($cartItem)
                                        <form method="POST" action="{{ route('add.to.cart') }}"
                                            class="d-flex align-items-center">
                                            @csrf
                                            <input type="hidden" name="package_id" value="{{ $web->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn_theme">Add To Cart</button>
                                        </form>
                                    @endunless

                                    @if ($cartItem)
                                        <button type="submit" class="btn_theme" disabled>Add To Cart</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>


    <section class="custom_php_laravel py_8 pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="img_custom">
                        <img src="{{ asset('public/frontend/img/wix_about.webp') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content_custom_php">
                        <h2><span class="linear_color">Wix Website</span> Development</h2>
                        <p>Create a powerful online presence with a custom Wix website tailored to your business needs. At
                            ProWebShop,
                            we design visually stunning, user-friendly, and mobile-responsive websites that help you stand
                            out. Whether
                            you’re a startup, small business, or enterprise, our expert team ensures a seamless and
                            professional digital
                            experience.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature_product services_feature_pro py_8 ">
        <div class="container">
            <div class="pricing_heading">
                <h2>Our Featured Services</h2>
                <p>At ProWebShop, we provide world-class Wix Website Development Services, helping businesses build
                    stunning,
                    high-performing websites tailored to their needs.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_service_3.png') }}" alt="">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Website Setup & Customization</h3>
                            <p>Get a fully customized, SEO-friendly Wix website designed to match your brand. Our experts
                                handle layout,
                                fonts, colors, and complete setup to ensure a seamless online presence.</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_service_3.png') }}" alt="">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Theme Development</h3>
                            <p>We create unique, user-friendly Wix themes from scratch, ensuring responsive, engaging
                                designs that
                                enhance user experience and business value.</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_service_3.png') }}" alt="">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Web Design Solution</h3>
                            <p>Our expert Wix developers craft high-performance websites that are fast, secure, and
                                accessible across
                                all devices and browsers, ensuring a smooth user experience.</p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="earning_prowebshop py_8">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card light-purple"
                        style="background-image: url({{ asset('public/frontend/img/seller-bg.png') }});">
                        <h2>Custom Wix Website Development</h2>
                        <p>Unlock the power of Wix with a fully customized, responsive, and SEO-friendly website. Whether
                            you need an
                            eCommerce store, portfolio, or business website, we craft solutions that stand out.
                        </p>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card light-pink" style="background-image: url({{ asset('public/frontend/img/seller-bg.png') }});">
                        <h2>Seamless Performance & Easy Management</h2>
                        <p>With intuitive design, smooth navigation, and fast loading speeds, our Wix experts ensure your
                            site
                            delivers the best user experience. Manage content effortlessly with Wix’s powerful drag-and-drop
                            editor.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add to Cart AJAX
            document.querySelectorAll('.add-to-cart-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(form);
                    const packageId = form.dataset.packageId;

                    fetch("{{ route('add.to.cart') }}", {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': formData.get('_token'),
                                'Accept': 'application/json'
                            },
                            body: formData
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                // Replace the "Add to Cart" form with + / - UI
                                const wrapper = document.querySelector(`#package-${packageId}`);
                                wrapper.innerHTML = `
                        <div class="btn_pricing_cards d-flex align-items-center gap-2 qty-controls">
                            <button type="button" class="btn btn-secondary" onclick="decrementQty(this)">−</button>
                            <input type="number" class="qty-input form-control w-25 text-center" value="1" readonly>
                            <button type="button" class="btn btn-secondary" onclick="incrementQty(this)">+</button>
                        </div>`;
                            } else {
                                alert(data.error || 'Something went wrong.');
                            }
                        })
                        .catch(err => alert('Failed to add to cart.'));
                });
            });
        });


        function incrementQty(button) {
            const wrapper = button.closest('.package-wrapper');
            const input = wrapper.querySelector('.qty-input');
            let qty = parseInt(input.value);
            const packageId = wrapper.id.replace('package-', '');

            qty++;
            updateCartQty(packageId, qty, input);
        }

        function decrementQty(button) {
            const wrapper = button.closest('.package-wrapper');
            const input = wrapper.querySelector('.qty-input');
            let qty = parseInt(input.value);
            const packageId = wrapper.id.replace('package-', '');

            if (qty > 1) {
                qty--;
                updateCartQty(packageId, qty, input);
            }
        }

        function updateCartQty(packageId, qty, inputEl) {
            fetch("{{ route('cart.updateQty') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        package_id: packageId,
                        quantity: qty
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        inputEl.value = qty;
                    } else {
                        alert(data.error || 'Failed to update quantity');
                    }
                })
                .catch(error => {
                    console.error(error);
                    alert('Something went wrong');
                });
        }
    </script>
@endsection
