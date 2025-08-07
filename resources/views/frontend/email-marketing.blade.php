@extends('frontend.layout.app')
@section('title', $meta_title->meta_value ?? 'Default Website Title')
@section('description', $meta_description->meta_value ?? 'Default description')
@section('content')
    <section class="banner_about_us py_8" style="background-image: url({{ asset('public/frontend/img/ppc_banner.png') }});">
        <div class="container">
            <div class="row">
                <div class="text_about_us">
                    <h1>Email Marketing Packages</h1>
                    <p>Engage your audience and boost conversions with our result-driven, customizable Email Marketing Packages for every business size.
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
                <h2>Transparent Email Marketing Packages Pricing for Every Business</h2>
                <p>Affordable plans tailored to your marketing goals reach more, convert faster, and grow smarter with data-driven email campaigns.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($emailMarkeitng as $email)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $email->id)}}">
                            <img src="{{ asset('public/storage/' . $email->image) }}" alt="Starter Email & SMS Package">
                            <h3>{{ $email->title }}</h3>
                            @php
                                $amounts = explode(' ', $email->amount);
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
                                @foreach (preg_split('/\r\n|\r|\n/', $email->description) as $feature)
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
                                        ->where('package_id', $email->id)
                                        ->first();
                                }
                            @endphp
                            <div id="package" class="package-wrapper">
                              @unless ($cartItem)
                                    <form method="POST" action="{{ route('add.to.cart') }}"
                                        class="d-flex align-items-center">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $email->id }}">
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
                        <img src="{{ asset('public/frontend/img/smo_about.webp') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="content_custom_php">
                        <h2><span class="linear_color">Email Marketing</span> & Bulk Sms</h2>
                        <p>Boost your business with targeted Email Marketing and bulk SMS campaigns! With personalized
                            messages, you can reach your audience instantly, increase engagement, and drive conversions. At
                            Pro Web Shop, we create compelling email and SMS strategies to enhance brand awareness, generate
                            leads, and maximize ROI. Connect with your customers effectively and grow your business today!
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
                <p>Explore our top-rated digital solutions designed to enhance your business. From marketing services to web
                    development, find everything you need in one place!
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_marketing_img/Email-Marketing-&-Bulk-SMS.png') }}" alt="">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Email Marketing & Bulk SMS</h3>
                            <p>Boost customer engagement with powerful email marketing and bulk SMS solutions. Connect
                                instantly, drive conversions, and enhance brand communication.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_marketing_img/Automated-Messaging-Solutions.png') }}" alt="">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Automated Messaging Solutions</h3>
                            <p>Streamline your outreach with automated email and SMS campaigns. Deliver personalized
                                messages at scale for higher response rates and improved customer retention.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/digital_marketing_img/Targeted-Marketing-Campaigns.png') }}" alt="">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Targeted Marketing Campaigns</h3>
                            <p>Reach the right audience with precision-targeted email and SMS marketing. Maximize engagement
                                and sales with data-driven messaging strategies.
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
                        <h2>Maximize Engagement with Email Marketing & Bulk SMS</h2>
                        <p>Reach your audience instantly with high-converting email and SMS campaigns. Boost customer
                            interaction, drive sales, and enhance brand loyalty effortlessly.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card light-pink" style="background-image: url({{ asset('public/frontend/img/seller-bg.png') }});">
                        <h2>Boost Your Outreach with Email Marketing & Bulk SMS</h2>
                        <p>Leverage powerful email and SMS campaigns to connect with your audience effectively. Drive
                            conversions, increase engagement, and enhance brand visibility effortlessly!

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
