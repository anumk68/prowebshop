@extends('frontend.layout.app')
@section('title', $meta_title->meta_value ?? 'Default Website Title')
@section('description', $meta_description->meta_value ?? 'Default description')
@section('content')
    <section class="banner_about_us py_8" style="background-image: url({{ asset('public/frontend/img/ppc_banner.png') }});">
        <div class="container">
            <div class="row">
                <div class="text_about_us">
                    <h1>PPC Advertising Packages</h1>
                    <p>Drive targeted traffic, boost conversions, and maximize ROI with our expertly crafted PPC advertising packages tailored to your business goals.
                       </p>
                    <div class="banner_btn_services">
                        <a href="{{ route('contact.us') }}">
                            <button class="btn_theme">Book Free Consultation</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pricing-section py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2>Power Your Growth with Result-Driven PPC Packages</h2>
                <p>Maximize your ROI with Pro Web Shop’s result-driven PPC services. Our expert team creates targeted ad
                    campaigns on Google, Bing, and social platforms to drive instant traffic, leads, and conversions for
                    your business.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($ppc as $ppcc)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                            <img src="{{ asset('public/storage/' . $ppcc->image) }}" alt="ppc services">
                            <h3>{{ $ppcc->title }}</h3>
                            @php
                                $amounts = explode(' ', $ppcc->amount);
                                $firstAmount = $amounts[0] ?? '';
                                $secondAmount = $amounts[1] ?? '';
                            @endphp
                            <p class="price">
                                <span>Estimated Cost:</span>
                                <span>{{ $firstAmount }}</span>
                                @if ($secondAmount)
                                    <del>{{ $secondAmount }}</del>
                                @endif
                            </p>
                            <ul>
                                @foreach (preg_split('/\r\n|\r|\n/', $ppcc->description) as $feature)
                                    @php
                                        $cleanFeature = trim(
                                            preg_replace(
                                                '/\s+/',
                                                ' ',
                                                strip_tags(html_entity_decode($feature, ENT_QUOTES | ENT_HTML5)),
                                            ),
                                        );
                                    @endphp
                                    @if ($cleanFeature !== '')
                                        <li style="display: flex; align-items: center;">
                                            <i class="fa-solid fa-check" style="margin-right: 6px;"></i>
                                            <span style="color: black;">{{ $cleanFeature }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            @php
                                $user = auth()->guard('userWeb')->user();
                                $cartItem = null;

                                if ($user) {
                                    $cartItem = App\Models\Cart::where('user_id', $user->id)
                                        ->where('package_id', $ppcc->id)
                                        ->first();
                                }
                            @endphp
                            <div id="package" class="package-wrapper">
                                @unless ($cartItem)
                                    <form method="POST" action="{{ route('add.to.cart') }}"
                                        class="d-flex align-items-center">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $ppcc->id }}">
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
                @endforeach
            </div>
        </div>
    </section>
    <section class="custom_php_laravel py_8 pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="img_custom">
                        <img src="{{ asset('public/frontend/img/ppc_about.png') }}" alt="ppc packages
                            ">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="content_custom_php">
                        <h2>Maximize ROI with Our Expert <span class="linear_color">PPC Services</span></h2>
                        <p>Drive instant traffic and boost conversions with our result-driven PPC services. We create highly
                            targeted ad campaigns on Google, Bing, and social media to ensure maximum reach. Our team
                            optimizes keywords, ad copy, and bidding strategies to lower costs and increase ROI. Whether you
                            need search ads, display ads, or remarketing, we’ve got you covered. Get measurable results and
                            grow your business with our tailored PPC solutions. Let’s turn clicks into customers!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="feature_product services_feature_pro py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2>Top Featured Products Just for You</h2>
                <p>Discover the best-selling and most-loved products, carefully selected for quality and performance. Shop
                    now!
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_marketing_img/Google-Ads-Management.png') }}" alt="">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Google Ads Management</h3>
                            <p>Maximize your ROI with targeted Google Ads campaigns. We optimize keywords, bidding, and ad
                                copy to drive high-quality traffic.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_marketing_img/Social-Media-Advertising.png') }}" alt="ppc services packages
                            ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Social Media Advertising</h3>
                            <p>Engage your audience with powerful social media ads. We create and manage campaigns on
                                Facebook, Instagram, and LinkedIn for maximum impact.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_marketing_img/E-Commerce-PPC-Solutions.png') }}" alt="ppc advertising packages
                                ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>E-Commerce PPC Solutions</h3>
                            <p>Boost sales with strategic PPC ads for e-commerce. Our data-driven approach ensures higher
                                conversions and lower ad spend.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="earning_prowebshop py_8">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card light-purple"
                        style="background-image: url({{ asset('public/frontend/img/seller-bg.png') }});">
                        <h2>Boost Sales with Targeted PPC Ads</h2>
                        <p>Increase conversions and drive instant traffic with data-driven PPC campaigns. Maximize your ROI
                            with optimized ad strategies tailored to your business.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card light-pink"
                        style="background-image: url({{ asset('public/frontend/img/seller-bg.png') }});">
                        <h2>Smart Advertising for Maximum ROI</h2>
                        <p>Reach the right audience at the right time with precision-targeted PPC ads. Lower your ad spend
                            while achieving higher engagement and sales!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
