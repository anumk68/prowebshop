@extends('frontend.layout.app')
@section('title', $meta_title->meta_value ?? 'Default Website Title')
@section('description', $meta_description->meta_value ?? 'Default description')
@section('content')
    <section class="banner_about_us py_8"
        style="background-image: url({{ asset('public/frontend/img/php_laravel_banner.png') }});">
        <div class="container">
            <div class="row">
                <div class="text_about_us">
                    <h1>Laravel/PHP Packages</h1>
                    <p>We at ProWebShop build high-performing PHP Laravel websites that suit your business requirements. Our
                        skilled
                        developers remain updated with the latest trends to make your site fast, secure, and scalable.</p>
                    <div class="banner_btn_services">
                        <button class="btn_theme"><a href="{{ route('contact.us') }}">Book Free Consultation</a></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pricing-section py_8">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($php as $laravel)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $laravel->id)}}">

                            <img src="{{ asset('public/storage/' . $laravel->image) }}" alt="php packages">
                            <h3>{{ $laravel->title }}</h3>
                            @php
                                // Split the string by space
                                $amounts = explode(' ', $laravel->amount);
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
                                @foreach (preg_split('/\r\n|\r|\n/', $laravel->description) as $feature)
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
                                    $cartItem = \App\Models\Cart::where('user_id', $user->id)
                                        ->where('package_id', $laravel->id)
                                        ->first();
                                }
                            @endphp

                            <div id="package-{{ $laravel->id }}" class="package-wrapper">
                                <form method="POST" action="{{ route('add.to.cart') }}" class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $laravel->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn_theme">
                                        {{ $cartItem ? 'Add More' : 'Add To Cart' }}
                                    </button>
                                </form>
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
                <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                    <div class="img_custom">
                        <img src="{{ asset('public/frontend/img/custom_php_laravel.webp') }}"
                            alt="php website development
">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                    <div class="content_custom_php">
                        <h2>Custom <span class="linear_color">PHP Laravel </span> Solutions</h2>
                        <p>Unlock the full potential of PHP Laravel with our expert development services. We create highly
                            scalable,
                            secure, and high-performing web applications tailored to your business needs. Whether you need a
                            dynamic
                            website, a complex web portal, or a custom API, our Laravel solutions ensure seamless
                            functionality and a
                            superior user experience.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="feature_product services_feature_pro py_8 ">
        <div class="container">
            <div class="pricing_heading">
                <h2>PHP Laravel Website Development Services</h2>
                <p>Every month we pick some best products for you. This month's best web themes & templates have arrived,
                    chosen
                    by our content specialists.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/web_services/Custom-PHP-Laravel-Development.png') }}"
                                alt="laravel web development agency
">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Custom PHP Laravel Development</h3>
                            <p>Power your company with high-performing, scalable Laravel solutions. We craft customized
                                applications and
                                websites that are flexible, secure, and efficient—specific to your line of business.</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/web_services/Laravel-E-Commerce-Solutions.png') }}"
                                alt="php packages">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Laravel E-Commerce Solutions</h3>
                            <p>Take advantage of Laravel's robust framework to build a seamless online shopping experience.
                                Our
                                e-commerce solutions provide secure payment integrations, product management, and
                                conversion-friendly
                                interfaces for higher conversion rates.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/web_services/Web-&-Mobile-Responsiveness.png') }}"
                                alt="best php packages">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Web & Mobile Responsiveness</h3>
                            <p>Provide a rich user experience on every device. Our mobile-first design ensures your Laravel
                                website is
                                fully responsive, with easy navigation and accessibility on desktops, tablets, and
                                smartphones.</p>
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
                        <h2>Build Scalable & High-Performance Web Applications</h2>
                        <p>Leverage the power of Laravel, the most popular PHP framework, to create robust, secure, and
                            scalable web
                            applications. Our expert Laravel developers craft tailored solutions for businesses of all
                            sizes, ensuring
                            efficiency, security, and seamless functionality.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card light-pink"
                        style="background-image: url({{ asset('public/frontend/img/seller-bg.png') }});">
                        <h2>End-to-End Laravel Development Solutions</h2>
                        <p>From custom web applications to enterprise-level solutions, we provide full-cycle Laravel
                            development
                            services. Our goal is to deliver fast, secure, and feature-rich platforms that help businesses
                            scale and
                            succeed in the digital landscape.</p>
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
