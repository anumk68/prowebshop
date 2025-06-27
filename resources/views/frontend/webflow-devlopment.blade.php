@extends('frontend.layout.app')

@section('content')
    <section class="banner_about_us py_8"
        style="background-image: url({{asset('public/frontend/img/custom_devlopment_banner.png')}});">
        <div class="container">
            <div class="row">
                <div class="text_about_us">
                    <h1>Webflow Website Development Services</h1>
                    <p>Do you want to create a high-performing Webflow website that maximizes user experience and increases
                        conversions?
                    </p>
                    <div class="banner_btn_services">
                        <a href="{{route('contact.us')}}">
                        <button class="btn_theme">Book Free Consultation </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pricing-section py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2>Select the Package That Fits You Best</h2>
                <p>Website Design Innovation provides various packages for WordPress development. Our packages aim to offer
                    you the utmost flexibility while fulfilling your website needs.</p>
            </div>
            <div class="row">
                @foreach ($webFlow as $web)
                    <div class="col-md-4">
                        <div class="pricing-card">

                            <img src="{{ asset('public/storage/' . $web->image) }}" alt="WordPress Startup Package">
                            <h3>{{ $web->title }}</h3>
                            @php
                                $amounts = explode(' ', $web->amount);
                                $firstAmount = $amounts[0] ?? '';
                                $secondAmount = $amounts[1] ?? '';
                            @endphp
                            <p class="price">
                                <span>{{ $firstAmount }}</span>
                                @if ($secondAmount)
                                    <del>{{ $secondAmount }}</del>
                                @endif
                            </p>
                            <ul>
                                @foreach (preg_split('/\r\n|\r|\n/', $web->description) as $feature)
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
                                        <li><i class="fa-solid fa-check"></i> {{$cleanFeature}}</li>
                                    @endif
                                @endforeach
                            </ul>

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
                @endforeach
            </div>
        </div>
    </section>
    <section class="custom_php_laravel py_8 pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="img_custom">
                        <img src="{{asset('public/frontend/img/custom_devlopment_about.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content_custom_php">
                        <h2><span class="linear_color"> Webflow Development </span>Services</h2>
                        <p>Elevate your online presence with our Webflow Website Development Services, designed to deliver
                            visually stunning, high-performance websites tailored to your business needs. Our expert team
                            creates fully responsive, fast-loading, and SEO-optimized websites that not only look great but
                            also drive engagement and conversions. With Webflow’s no-code platform, you get a flexible,
                            scalable, and easy-to-manage website with seamless animations and interactive elements.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature_product services_feature_pro py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2>Our Premium Services</h2>
                <p>Discover our top-rated services designed to enhance your online presence and business efficiency. From
                    stunning websites to powerful management tools and strategic marketing, we provide comprehensive digital
                    solutions tailored to your needs.
                </p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{asset('public/frontend/img/digital_service_3.png')}}" alt="">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Webflow Website Development</h3>
                            <p>Create a visually striking, fully responsive, and high-performing website with our expert
                                Webflow Website Development services. Whether you need a business site, portfolio, or
                                eCommerce store, we deliver user-friendly and SEO-optimized solutions.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{asset('public/frontend/img/digital_service_3.png')}}" alt="">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Custom Web Application Development</h3>
                            <p>Streamline your operations with tailor-made Web Applications that enhance productivity and
                                workflow efficiency. Our team develops powerful, scalable, and secure management systems
                                customized for your business processes.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{asset('public/frontend/img/digital_service_3.png')}}" alt="">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Webflow CMS Design & Development</h3>
                            <p>Leverage the power of Webflow’s CMS with expertly designed, scalable, and easy-to-manage
                                websites that grow with your business.
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
                <div class="col-md-6">
                    <div class="card light-purple" style="background-image: url({{asset('public/frontend/img/seller-bg.png')}});">
                        <h2>Build High-Performing Webflow Websites
                        </h2>
                        <p>Unlock the full potential of Webflow with our expert development services. We create custom,
                            responsive, and SEO-friendly websites that elevate your brand and drive results. Whether you
                            need a business site, eCommerce store, or portfolio, our team delivers a seamless Webflow
                            experience.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card light-pink" style="background-image: url({{asset('public/frontend/img/seller-bg.png')}});">
                        <h2>Why Choose Our Webflow Experts?</h2>
                        <p>Our team of certified Webflow developers ensures that every project is built with precision,
                            creativity, and performance in mind. We don’t just design—we develop functional, scalable, and
                            conversion-driven websites tailored to your business needs.</p>
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
