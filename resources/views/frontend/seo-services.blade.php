@extends('frontend.layout.app')
@section('title', $meta_title->meta_value ?? 'Default Website Title')
@section('description', $meta_description->meta_value ?? 'Default description')
@section('content')
    <section class="banner_about_us py_8" style="background-image: url({{ asset('public/frontend/img/seo_banner.png') }});">
        <div class="container">
            <div class="row">
                <div class="text_about_us">
                    <h1>Affordable SEO Packages</h1>
                       <p>Drive more traffic, boost search rankings, and grow your business with our budget-friendly SEO packages tailored to your goals.
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
                <h2>SEO Prices Packages That Deliver Real Results</h2>
                <p>Drive more traffic, boost search rankings and grow your business with our budget-friendly SEO packages tailored to your goals.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($seo as $seoss)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $seoss->id)}}">
                            <img src="{{ asset('public/storage/' . $seoss->image) }}" alt="search engine optimization services
                        ">
                            <h3>{{ $seoss->title }}</h3>
                            @php
                                $amounts = explode(' ', $seoss->amount);
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
                             </a>
                            <ul>
                                @foreach (preg_split('/\r\n|\r|\n/', $seoss->description) as $feature)
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
                                        ->where('package_id', $seoss->id)
                                        ->first();
                                }
                            @endphp
                            <div id="package" class="package-wrapper">
                                @unless ($cartItem)
                                    <form method="POST" action="{{ route('add.to.cart') }}"
                                        class="d-flex align-items-center">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $seoss->id }}">
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
                        <img src="{{ asset('public/frontend/img/seo_about.webp') }}" alt="seo services ">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="content_custom_php">
                        <h2> Best <span class="linear_color">SEO Services</span></h2>
                        <p>Boost your website’s ranking and attract the right audience with our powerful SEO services. We
                            optimize your site with cutting-edge strategies, including keyword research, technical SEO, and
                            high-quality backlinks. Stay ahead of competitors with our tailored solutions designed for
                            long-term success. Let us help you dominate search engines and grow your business effortlessly!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="feature_product services_feature_pro py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2>Featured Products</h2>
                <p>Handpicked for quality and performance, our top-rated products offer the best value and innovation.
                    Explore now!
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_marketing_img/On-Page-SEO-Optimization.png') }}" alt="seo packages
                        ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>On-Page SEO Optimization</h3>
                            <p>Enhance your website’s performance with structured on-page SEO. We optimize content, meta
                                tags, and site speed for better rankings.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_marketing_img/Off-Page-SEO-&-Link-Building.png') }}" alt="seo prices packages
                                ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Off-Page SEO & Link Building</h3>
                            <p>Boost domain authority with high-quality backlinks and strategic off-page SEO. Strengthen
                                your online presence with proven techniques.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_marketing_img/Local-&-Technical-SEO.png') }}" alt="affordable seo packages
                        ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Local & Technical SEO</h3>
                            <p>Improve local search visibility and fix technical SEO issues. We ensure your site is
                                optimized for mobile, speed, and search engines.
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
                        <h2>Maximize Your Website’s Potential</h2>
                        <p>Boost your search rankings and drive organic traffic with expert SEO strategies. Achieve higher
                            visibility and long-term success effortlessly!
                        </p>

                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card light-pink"
                        style="background-image: url({{ asset('public/frontend/img/seller-bg.png') }});">
                        <h2>Earn Up to 40% Commission Effortlessly</h2>
                        <p>Join the world’s largest creative marketplace and maximize your earnings with high affiliate
                            commissions. Start earning today!</p>
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
