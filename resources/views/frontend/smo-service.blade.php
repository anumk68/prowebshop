@extends('frontend.layout.app')
@section('title', $meta_title->meta_value ?? 'Default Website Title')
@section('description', $meta_description->meta_value ?? 'Default description')
@section('content')
    <section class="banner_about_us py_8" style="background-image: url({{ asset('public/frontend/img/ppc_banner.png') }});">
        <div class="container">
            <div class="row">
                <div class="text_about_us">
                    <h1>Best SMO Packages</h1>
                    <p>Boost your brand visibility and engagement with our best SMO packages tailored for social success.
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
                <h2>Best SMO Packages to Elevate Your Social Media Presence</h2>
                <p>Maximize your brand’s visibility, engagement and follower growth with our result-driven SMO packages tailored for all major platforms.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($smo as $smoss)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $smoss->id)}}">
                            <img src="{{ asset('public/storage/' . $smoss->image) }}" alt="smo services
                            ">
                            <h3>{{ $smoss->title }}</h3>
                            @php
                                $amounts = explode(' ', $smoss->amount);
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
                                @foreach (preg_split('/\r\n|\r|\n/', $smoss->description) as $feature)
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
                                        ->where('package_id', $smoss->id)
                                        ->first();
                                }
                            @endphp
                            <div id="package" class="package-wrapper">
                                  @unless ($cartItem)
                                    <form method="POST" action="{{ route('add.to.cart') }}"
                                        class="d-flex align-items-center">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $smoss->id }}">
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
                        <img src="{{ asset('public/frontend/img/smo_about.webp') }}" alt="best smo agency">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="content_custom_php">
                        <h2><span class="linear_color">SMO </span>Services</h2>
                        <p>Maximize your brand’s online presence with our expert Social Media Optimization (SMO) services.
                            We craft engaging, high-quality content and implement targeted strategies to boost visibility,
                            drive audience engagement, and increase conversions. From Instagram and Facebook to YouTube,
                            LinkedIn, Pinterest, and TikTok, we ensure your brand stands out on every platform. Elevate your
                            social media game with Pro Web Shop!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="feature_product services_feature_pro py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2>Discover Our Featured Products</h2>
                <p>Explore top-rated digital solutions designed to enhance your business. From web development to marketing
                    services, find everything you need in one place!
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_marketing_img/Social-Media-Optimization-(SMO)-Services.png') }}" alt="best smo packages
                                ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Social Media Optimization (SMO) Services</h3>
                            <p>Enhance your brand’s visibility and engagement across social platforms. Build a strong online
                                presence and connect with your audience effectively.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_marketing_img/Social-Media-Management-&-Growth.png') }}" alt="social media optimization package
                        ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Social Media Management & Growth</h3>
                            <p>Drive meaningful interactions and boost your reach with expert SMO strategies. Turn followers
                                into loyal customers with targeted campaigns.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_marketing_img/Content-Creation-&-Branding.png') }}" alt="smo services
                                ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Content Creation & Branding</h3>
                            <p>Create compelling social media content that resonates with your audience. Strengthen your
                                brand identity and increase engagement effortlessly.
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
                        <h2>Maximize Engagement with SMO Services</h2>
                        <p>Boost your brand’s visibility and drive organic traffic through powerful social media strategies.
                            Connect, engage, and grow your audience effortlessly!
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card light-pink" style="background-image: url({{ asset('public/frontend/img/seller-bg.png') }});">
                        <h2>Grow Your Brand with SMO Services</h2>
                        <p>Leverage social media to expand your reach and increase engagement. Drive more traffic and
                            maximize your online presence effortlessly!
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
