@extends('frontend.layout.app')

@section('title', $meta_title->meta_value ?? 'Default Website Title')
@section('description', $meta_description->meta_value ?? 'Default description')
@section('content')
    <section class="banner_about_us py_8" style="background-image: url({{ asset('public/frontend/img/ppc_banner.png') }});">
        <div class="container">
            <div class="row">
                <div class="text_about_us">
                    <h1>Packages for Graphic Design</h1>
                    <p>
                     Get creative and impactful graphic design packages tailored for logos, branding, social media, and marketing materials, all in one place.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="pricing-section py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2>Creative Graphic Design Packages to Elevate Your Brand Identity</h2>
                <p>Stand out with our graphic design packages, perfect for logos, branding, social media, and marketing materials that captivate audiences.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($graphic as $design)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $design->id)}}">
                            <img src="{{ asset('public/storage/' . $design->image) }}" alt="graphic designing services
                            ">
                            <h3>{{ $design->title }}</h3>
                            @php
                                $amounts = explode(' ', $design->amount);
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
                                @foreach (preg_split('/\r\n|\r|\n/', $design->description) as $feature)
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
                                        ->where('package_id', $design->id)
                                        ->first();
                                }
                            @endphp
                            <div id="package" class="package-wrapper">
                                 @unless ($cartItem)
                                    <form method="POST" action="{{ route('add.to.cart') }}"
                                        class="d-flex align-items-center">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $design->id }}">
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
                        <img src="{{ asset('public/frontend/img/smo_about.webp') }}" alt="graphic designing services
                        ">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="content_custom_php">
                        <h2>Professional Designs At ProWebShop That Build Stronger Brands</h2>
                        <p>We deliver high-quality, custom graphic designs that reflect your brand's vision and connect with
                            your audience. From eye-catching logos and engaging social media posts to corporate brochures
                            and marketing materials, our creative team ensures every design is pixel-perfect and
                            strategy-driven. Whether you’re launching a brand or refreshing your look, our designs help you
                            stand out and leave a lasting impression.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="feature_product services_feature_pro py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2>Featured Services</h2>
                <p>Explore our best-in-class graphic design solutions crafted to elevate your brand’s identity. From visual
                    storytelling to digital creatives, find everything you need to make a lasting impression — all in one
                    place!
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_marketing_img/Brand-Identity-&-Logo-Design.png') }}" alt="packages for graphic design
                            ">
                        </div>
                        <div class="txt_feture_product">
                            <h4>Brand Identity & Logo Design</h4>
                            <p>Establish a strong visual foundation with unique logo designs and cohesive brand identity
                                kits. We create memorable visuals that reflect your brand’s values and leave a lasting
                                impact on your audience.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_marketing_img/Social-Media-Creatives.png') }}" alt="graphic design packages for small business
                                ">
                        </div>
                        <div class="txt_feture_product">
                            <h4>Social Media Creatives</h4>
                            <p>Capture attention across platforms with custom-designed posts, banners, and ad creatives. Our
                                designs are tailored to engage your audience, boost shares, and drive brand awareness across
                                digital channels.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_marketing_img/Print-&-Marketing-Collateral.png') }}" alt="graphic designing services
                            ">
                        </div>
                        <div class="txt_feture_product">
                            <h4>Print & Marketing Collateral</h4>
                            <p>From brochures and flyers to business cards and packaging — our print design services ensure
                                every material looks polished, professional, and brand-consistent, helping you stand out in
                                any market.
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
                        <h3>Maximize Brand Impact with Stunning Graphic Designs</h3>
                        <p>Attract and engage your audience with compelling graphic visuals crafted to tell your brand
                            story. From logo creation to digital assets, we design with purpose to drive recognition, trust,
                            and impact.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card light-pink"
                        style="background-image: url({{ asset('public/frontend/img/seller-bg.png') }});">
                        <h3>Boost Your Visual Identity with Custom Graphic Design</h3>
                        <p>Empower your brand with creative and conversion-focused designs. Whether it’s for social media,
                            print, or digital platforms, our professional graphics ensure consistency, clarity, and visual
                            appeal across every touchpoint.
                        </p>
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
