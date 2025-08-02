@extends('frontend.layout.app')
@section('title', $meta_title->meta_value ?? 'Default Website Title')
@section('description', $meta_description->meta_value ?? 'Default description')
@section('content')
    <section class="banner_about_us py_8"
        style="background-image: url({{ asset('public/frontend/img/wordpress_banner.png') }});">
        <div class="container">
            <div class="row">
                <div class="text_about_us">
                    <h1>WordPress Packages</h1>
                    <p>Elevate your brand with high-performance WordPress solutions. At ProWebShop, we craft responsive,
                        SEO-optimized websites that enhance user experience, drive engagement, and help your business thrive
                        online.
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
    <section class="pricing-section py_8 pb-0">
        <div class="container">
            <div class="pricing_heading">
                <h2>Scalable WordPress Development Plans Designed for Every Business Size</h2>
                <p>Explore flexible WordPress Development Plans crafted for startups to enterprises—secure, SEO-friendly and
                    fully customized by expert developers.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($wordpress as $word)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                            <img src="{{ asset('public/storage/' . $word->image) }}" alt="wordpress website development
                                            ">
                            <h3>{{ $word->title }}</h3>
                            @php
                                $amounts = explode(' ', $word->amount);
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
                                @foreach (preg_split('/\r\n|\r|\n/', $word->description) as $feature)
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
                                        ->where('package_id', $word->id)
                                        ->first();
                                }
                            @endphp
                            <div id="package" class="package-wrapper">
                                @unless ($cartItem)
                                    <form method="POST" action="{{ route('add.to.cart') }}" class="d-flex align-items-center">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $word->id }}">
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
    <section class="custom_php_laravel py_8">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="img_custom">
                        <img src="{{ asset('public/frontend/img/wix_about.webp') }}" alt="wordpress development company ">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="content_custom_php">
                        <h2>Leading <span class="linear_color">WordPress Development </span>Company</h2>
                        <p>At ProWebShop we specialize in creating feature-rich, modern, and highly responsive WordPress
                            websites
                            tailored to meet your business goals. Our expert team builds high-performance WordPress
                            solutions with
                            intuitive designs, seamless functionality, and top-tier security to enhance user experience and
                            drive
                            engagement.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="feature_product services_feature_pro py_8 ">
        <div class="container">
            <div class="pricing_heading">
                <h2>Our Featured Services</h2>
                <p>Discover our top-tier services designed to help businesses thrive in the digital space. We offer
                    cutting-edge
                    solutions tailored to meet your unique needs and drive success.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/web_services/Website-Design-&-Development.png') }}" alt="wordpress web design packages
                                        ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Website Design & Development</h3>
                            <p>Transform your online presence with a visually stunning, high-performing website. Our expert
                                developers
                                craft user-friendly, responsive, and SEO-optimized websites that captivate audiences and
                                boost
                                conversions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/web_services/Management-Systems-Development.png') }}"
                                alt="wordpress website development packages
                                    ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Management Systems Development</h3>
                            <p>Streamline your operations with customized management systems. From CRM and ERP solutions to
                                inventory
                                and workflow management, we create tailored systems that enhance efficiency and
                                productivity.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/web_services/Digital-Marketing-&-Video-Editing.png') }}"
                                alt="wordpress development plans
                                    ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Digital Marketing & Video Editing</h3>
                            <p>Elevate your brand with our comprehensive digital marketing and video editing services. From
                                SEO, PPC,
                                and social media marketing to professional video editing, we ensure your brand stands out in
                                the
                                competitive digital landscape.</p>
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
                        <h2>Transform Your Online Presence</h2>
                        <p>Get a feature-rich, scalable, and high-performance WordPress website tailored to your business
                            needs. From
                            custom themes to advanced plugin development, we create stunning, SEO-friendly websites that
                            deliver
                            results.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card light-pink"
                        style="background-image: url({{ asset('public/frontend/img/seller-bg.png') }});">
                        <h2>Maximize Your Growth with Our Expertise</h2>
                        <p>Whether you're launching a new site or optimizing an existing one, our WordPress development
                            experts ensure
                            a seamless user experience, fast loading speeds, and enhanced functionality.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.add-to-cart-form').forEach(form => {
                form.addEventListener('submit', function (e) {
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