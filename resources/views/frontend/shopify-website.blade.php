@extends('frontend.layout.app')
@section('title', $meta_title->meta_value ?? 'Default Website Title')
@section('description', $meta_description->meta_value ?? 'Default description')
@section('content')
    <section class="banner_about_us py_8"
        style="background-image: url({{ asset('public/frontend/img/shopify_banner.png') }});">
        <div class="container">
            <div class="row">
                <div class="text_about_us">
                    <h1>Shopify Development Packages</h1>
                    <p>Are you looking to create a high-performing Shopify store that drives sales and delivers a seamless
                        shopping experience?
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
                <h2>Choose a Shopify Plan That Suits Your Needs</h2>
                <p>Pro Web Shop offers customizable Shopify plan to match your business goals. Whether you're just starting or scaling up, our affordable solutions ensure you get the best value for every investment.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($shopify as $shop)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                            <img src="{{ asset('public/storage/' . $shop->image) }}" alt="shopify website development
">
                            <h3>{{ $shop->title }}</h3>
                            @php
                                $amounts = explode(' ', $shop->amount);
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
                                @foreach (preg_split('/\r\n|\r|\n/', $shop->description) as $feature)
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
                                        ->where('package_id', $shop->id)
                                        ->first();
                                }
                            @endphp
                            <div id="package" class="package-wrapper">
                               @unless ($cartItem)
                                    <form method="POST" action="{{ route('add.to.cart') }}"
                                        class="d-flex align-items-center">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $shop->id }}">
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
                        <img src="{{ asset('public/frontend/img/shopify_website_about.jpg') }}" alt="hire professional shopify developer
">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="content_custom_php">
                        <h2>Professional <span class="linear_color">Shopify Website</span> Development</h2>
                        <p>Unlock the full potential of your eCommerce business with our Professional Shopify Website
                            Development services. Whether you’re starting from scratch or upgrading your existing store, we
                            provide customized, high-performance Shopify solutions designed to drive sales and enhance user
                            experience. Our expert developers create visually stunning, conversion-optimized, and
                            mobile-friendly Shopify stores that help your brand stand out in the competitive online
                            marketplace.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="feature_product services_feature_pro py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2>Our Shopify Solutions</h2>
                <p>Every business deserves a high-performing online store. Our team of Shopify experts crafts innovative,
                    conversion-driven eCommerce solutions tailored to your brand’s unique needs.
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/web_services/Store-Setup-&-Configuration.png') }}" alt="Custom Shopify Development
">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Store Setup & Configuration</h3>
                            <p>Launch your Shopify store with a hassle-free setup tailored to your business needs. We handle
                                everything from theme installation to payment gateway configuration, ensuring a smooth
                                start.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/web_services/Custom-Shopify-Development.png') }}" alt="shopify web design packages
">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Custom Shopify Development</h3>
                            <p>Get a unique, fully customized Shopify store that aligns with your brand identity. Our
                                developers craft bespoke solutions to enhance functionality, design, and user experience.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/web_services/Shopify-Web-Development.png') }}" alt="shopify plans
">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Shopify Web Development</h3>
                            <p>Build a robust and scalable eCommerce website with cutting-edge Shopify web development. Our
                                team ensures a secure, responsive, optimized store that drives sales and engagement.
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
                        <h2>Build a High-Converting Shopify Store</h2>
                        <p>Turn your eCommerce vision into reality with our professional Shopify development services.
                            Whether you're starting fresh or scaling an existing store, we design and develop custom,
                            sales-driven Shopify websites to maximize your revenue.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card light-pink"
                        style="background-image: url({{ asset('public/frontend/img/seller-bg.png') }});">
                        <h2>Seamless Shopify Solutions for Every Business</h2>
                        <p>We provide end-to-end Shopify solutions, from store setup to advanced customizations. Our Shopify
                            experts help you create a visually stunning, fully optimized, and conversion-focused online
                            store that stands out in the market.</p>
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
