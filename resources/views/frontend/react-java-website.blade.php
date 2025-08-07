@extends('frontend.layout.app')
@section('title', $meta_title->meta_value ?? 'Default Website Title')
@section('description', $meta_description->meta_value ?? 'Default description')
@section('content')
    <section class="banner_about_us py_8" style="background-image: url({{ asset('public/frontend/img/react_java_banner.png') }});">
        <div class="container">
            <div class="row">
                <div class="text_about_us">
                    <h1>Java/React Packages</h1>
                    <p>At ProWebShop, we design creative React–Java websites that provide speed, security, and effortless
                        user
                        experiences.
                    </p>
                    <div class="banner_btn_services">
                        <a href="{{route('contact.us')}}">
                        <button class="btn_theme">Book Free Consultation</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pricing-section py_8">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($react as $java)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $java->id)}}">
                            <img src="{{ asset('public/storage/' . $java->image) }}" alt="Java Development Services
">
                            <h3>{{ $java->title }} </h3>
                            @php
                                $amounts = explode(' ', $java->amount);
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
                                @foreach (preg_split('/\r\n|\r|\n/', $java->description) as $feature)
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
                                        ->where('package_id', $java->id)
                                        ->first();
                                }
                            @endphp
                            <div id="package" class="package-wrapper">
                              @unless ($cartItem)
                                    <form method="POST" action="{{ route('add.to.cart') }}"
                                        class="d-flex align-items-center">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $java->id }}">
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
                <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                    <div class="img_custom">
                        <img src="{{ asset('public/frontend/img/react_about.jpg') }}" alt="java development company
">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                    <div class="content_custom_php">
                        <h2>Custom <span class="linear_color">React & Java</span> Development</h2>
                        <p>Unlock the full potential of your web applications with our custom React and Java development
                            services. We
                            specialize in creating dynamic, high-performance, and scalable web solutions tailored to meet
                            your business
                            needs.
                        </p>
                        <p>Our expert developers leverage React's powerful front-end capabilities combined with Java's
                            robust backend
                            architecture to build secure, efficient, and user-friendly applications. Whether you need a
                            custom web
                            portal, enterprise application, or e-commerce solution, we ensure seamless performance,
                            responsiveness, and
                            a great user experience.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="feature_product services_feature_pro py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2>Our Premium Services</h2>
                <p>Explore our top-tier services designed to elevate your business with cutting-edge technology and
                    marketing
                    strategies. Our expert team specializes in delivering high-quality solutions tailored to your needs.
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/web_services/React-&-Java-Development.png') }}" alt="java development package
">
                        </div>
                        <div class="txt_feture_product">
                            <h3>React & Java Development</h3>
                            <p>Build dynamic, scalable, and high-performance applications with our React and Java
                                development services.
                                From enterprise applications to interactive web platforms, we ensure robust functionality,
                                seamless
                                performance, and an intuitive user experience.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/web_services/Custom-Management-Systems-Development.png') }}" alt="Custom React & Java Development
">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Custom Management Systems Development</h3>
                            <p>Enhance efficiency with custom management systems tailored to your business needs. We design
                                powerful
                                CRM, ERP, and automation tools to streamline operations, improve productivity, and support
                                data-driven
                                decision-making.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/web_services/Digital-Marketing-&-Video-Editing.png') }}" alt="React packages
">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Digital Marketing & Video Editing</h3>
                            <p>Boost your online presence with expert digital marketing strategies and engaging video
                                content. From SEO
                                and social media management to professional video editing, we help brands captivate
                                audiences and drive
                                meaningful engagement.
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
                        <h2>Build Dynamic & Scalable Web Applications</h2>
                        <p>Leverage the power of React and Java to create high-performance, scalable, and interactive web
                            applications. Our expert developers specialize in crafting fast, secure, and user-friendly
                            solutions
                            tailored to your business needs.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card light-pink" style="background-image: url({{ asset('public/frontend/img/seller-bg.png') }});">
                        <h2>End-to-End React Java Solutions</h2>
                        <p>From single-page applications (SPAs) to enterprise-level platforms, our React Java development
                            services
                            cover everything your business needs. We build solutions that ensure seamless performance,
                            intuitive UI, and
                            future-ready scalability.</p>
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
