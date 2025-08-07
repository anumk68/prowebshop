@extends('frontend.layout.app')
@section('title', $meta_title->meta_value ?? 'Default Website Title')
@section('description', $meta_description->meta_value ?? 'Default description')

@section('content')
    <section class="hero_banner">
        <div class="owl-carousel hero_banners owl-theme">
            <div class="item">
                <div class="banner_slide">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="banner_txt_hero">
                                    <h1>Best Digital Marketing Services – Pro Web Shop</h1>
                                    <p>Boost your online presence with Pro Web Shop's top-notch digital marketing services.
                                        From SEO to social media and PPC, we offer powerful strategies tailored to grow your
                                        brand, drive traffic, and maximize ROI.
                                    </p>
                                    <div class="btn_hero_btn">
                                        <a href="{{ route('contact.us') }}">
                                            <button class="btn_theme btn_blog">Contact Us</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="hero_banner_img">
                                    <img src="{{ asset('public/frontend/img/Gif-mockup22 (1).gif') }}"
                                        alt="web service packages">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="banner_slide">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="banner_txt_hero">
                                    <h2>Grow Your Business Online</h2>
                                    <p>Grow your business online with our expert digital marketing, SEO, and web development
                                        services. Reach more customers, boost visibility, and drive real results with Pro
                                        Web Shop.
                                    </p>
                                    <div class="btn_hero_btn">
                                        <a href="{{ route('contact.us') }}">
                                            <button class="btn_theme btn_blog">
                                                Contact Us</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="hero_banner_img">
                                    <img src="{{ asset('public/frontend/img/Loan-SuvidhaGIF (1).gif') }}" alt="best digital marketing services
                                                                                                        ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="banner_slide">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="banner_txt_hero">
                                    <h2>SEO, PPC & More</h2>
                                    <p>Unlock your brand’s full potential with powerful SEO, targeted PPC, and complete
                                        digital marketing solutions. Increase visibility, drive quality traffic, and turn
                                        visitors into loyal customers effortlessly.</p>
                                    <div class="btn_hero_btn">
                                        <a href="{{ route('contact.us') }}">
                                            <button class="btn_theme btn_blog">Contact
                                                Us</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="hero_banner_img">
                                    <img src="{{ asset('public/frontend/img/babycorngif (1).gif') }}" alt="digital marketing agency
                                                                                                        ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="logo_sliders py_8">
        <div class="container">
            <div class="owl-carousel logo_slides">
                <a href="{{ route('php-laravel-website') }}">
                    <div class="item"><img src="{{ asset('public/frontend/img/php (1).png') }}" alt="PHP Website">
                        <p>PHP Website</p>
                    </div>
                </a>
                <a href="{{ route('react-java-website') }}">
                    <div class="item"><img src="{{ asset('public/frontend/img/react (1).png') }}" alt="React Website">
                        <p>React Website</p>
                    </div>
                </a>
                <a href="{{ route('webflow-development') }}">
                    <div class="item"><img src="{{ asset('public/frontend/img/webflow.png') }}" alt="Webflow Website">
                        <p>Webflow Website</p>
                    </div>
                </a>
                <a href="{{ route('wix-website-development') }}">
                    <div class="item"><img src="{{ asset('public/frontend/img/wix.png') }}" alt="Wix Website">
                        <p>Wix Website</p>
                    </div>
                </a>
                <a href="{{ route('shopify-development') }}">
                    <div class="item"><img src="{{ asset('public/frontend/img/shopify.png') }}" alt="Shopify Website">
                        <p>Shopify Website</p>
                    </div>
                </a>
                <a href="{{ route('php-laravel-website') }}">
                    <div class="item"><img src="{{ asset('public/frontend/img/php (1).png') }}" alt="PHP Website">
                        <p>PHP Website</p>
                    </div>
                </a>
                <a href="{{ route('react-java-website') }}">
                    <div class="item"><img src="{{ asset('public/frontend/img/react (1).png') }}" alt="React Website">
                        <p>React Website</p>
                    </div>
                </a>
                <a href="{{ route('webflow-development') }}">
                    <div class="item"><img src="{{ asset('public/frontend/img/webflow.png') }}" alt="Webflow Website">
                        <p>Webflow Website</p>
                    </div>
                </a>
                <a href="{{ route('wix-website-development') }}">
                    <div class="item"><img src="{{ asset('public/frontend/img/wix.png') }}" alt="Wix Website">
                        <p>Wix Website</p>
                    </div>
                </a>
                <a href="{{ route('shopify-development') }}">
                    <div class="item"><img src="{{ asset('public/frontend/img/shopify.png') }}" alt="Shopify Website">
                        <p>Shopify Website</p>
                    </div>
                </a>

            </div>
        </div>
    </section>
    <section class="pricing-section">
        <div class="container">
            <div class="pricing_heading">
                <h2><span class="linear_color">PHP Laravel</span> Website Development Packages</h2>
                <p>Pro Web Shop builds powerful, scalable websites using PHP, Laravel, React, and Java technologies.
                    Experience fast, secure, and dynamic web solutions tailored to your business needs with the latest in
                    modern development frameworks.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($php as $laravel)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                            <a href="{{route('productdetail', $laravel->id)}}">
                            <img src="{{ asset('public/storage/' . $laravel->image) }}" alt="web service packages">

                            <h3>{{ $laravel->title }}</h3>
                            @php
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
                                        <li>
                                            <i class="fa-solid fa-check" style="margin-right: 6px;"></i>
                                            <span style="color: black;">{{ $cleanFeature }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            @php
                                $user = auth()->guard('userWeb')->user();
                                $cartItem = null;
                                $inSession = false;

                                if ($user) {
                                    $cartItem = App\Models\Cart::where('user_id', $user->id)
                                        ->where('package_id', $laravel->id)
                                        ->first();
                                } else {
                                    $sessionCart = session('cart', []);
                                    foreach ($sessionCart as $item) {
                                        if ($item['package_id'] == $laravel->id) {
                                            $inSession = true;
                                            break;
                                        }
                                    }
                                }
                            @endphp
                            <div id="package-{{ $laravel->id }}" class="package-wrapper">
                                <form method="POST" action="{{ route('add.to.cart') }}" class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $laravel->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn_theme">
                                        @if ($cartItem || $inSession)
                                            Add More
                                        @else
                                            Add To Cart
                                        @endif
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="pricing-section py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2><span class="linear_color">Webflow Website</span> Development Services Packages</h2>
                <p>Whether you're building a portfolio, business site, or a high-converting landing page, our Webflow
                    packages
                    are crafted to suit your scalability and performance needs.</p>
            </div>
            <div class="row justify-content-center">
                @foreach ($webFlow as $web)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $web->id)}}">
                            <img src="{{ asset('public/storage/' . $web->image) }}"
                                alt="best digital marketing services                                                                                                                                                                        ">
                            <h3>{{ $web->title }}</h3>
                            @php
                                $amounts = explode(' ', $web->amount);
                                $firstAmount = $amounts[0] ?? '';
                                $secondAmount = $amounts[1] ?? '';
                            @endphp
                            <p class="price">
                                <span>Estimated Cost :</span>
                                <span>{{ $firstAmount }}</span>
                                @if ($secondAmount)
                                    <del>{{ $secondAmount }}</del>
                                @endif
                            </p>
                             </a>
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
                                        <li>
                                            <i class="fa-solid fa-check" style="margin-right: 6px;"></i>
                                            <span style="color: black;">{{ $cleanFeature }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            @php
                                $user = auth()->guard('userWeb')->user();
                                $cartItem = null;
                                $inSession = false;

                                if ($user) {
                                    $cartItem = App\Models\Cart::where('user_id', $user->id)
                                        ->where('package_id', $web->id)
                                        ->first();
                                } else {
                                    $sessionCart = session('cart', []);
                                    foreach ($sessionCart as $item) {
                                        if ($item['package_id'] == $web->id) {
                                            $inSession = true;
                                            break;
                                        }
                                    }
                                }
                            @endphp
                            <div id="package-{{ $web->id }}" class="package-wrapper">
                                <form method="POST" action="{{ route('add.to.cart') }}" class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $web->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn_theme">
                                        @if ($cartItem || $inSession)
                                            Add More
                                        @else
                                            Add To Cart
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="pricing-section">
        <div class="container">
            <div class="pricing_heading">
                <h2><span class="linear_color">WordPress Website </span>Development Packages</h2>
                <p>Explore our custom WordPress website development packages designed for startups to enterprises. Get
                    responsive, SEO-friendly, and scalable websites that align with your brand and boost your online
                    presence.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($wordpress as $word)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $word->id)}}">
                            <img src="{{ asset('public/storage/' . $word->image) }}" alt="digital marketing agency">
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
                             </a>
                            <p style="margin-left: 12px;">{{ $word->ideal }}</p>
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
                                        <li>
                                            <i class="fa-solid fa-check" style="margin-right: 6px;"></i>
                                            <span style="color: black;">{{ $cleanFeature }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            @php
                                $user = auth()->guard('userWeb')->user();
                                $cartItem = null;
                                $inSession = false;

                                if ($user) {
                                    $cartItem = App\Models\Cart::where('user_id', $user->id)
                                        ->where('package_id', $word->id)
                                        ->first();
                                } else {
                                    $sessionCart = session('cart', []);
                                    foreach ($sessionCart as $item) {
                                        if ($item['package_id'] == $word->id) {
                                            $inSession = true;
                                            break;
                                        }
                                    }
                                }
                            @endphp
                            <div id="package-{{ $word->id }}" class="package-wrapper">
                                <form method="POST" action="{{ route('add.to.cart') }}" class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $word->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn_theme">
                                        @if ($cartItem || $inSession)
                                            Add More
                                        @else
                                            Add To Cart
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="pricing-section py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2><span class="linear_color">Custom Website</span> Development Packages</h2>
                <p>Get tailor-made website solutions built to match your unique business needs. Our custom development
                    packages ensure high performance, seamless user experience, and full scalability for long-term online
                    success.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($customDevelopment as $custom)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $custom->id)}}">
                            <img src="{{ asset('public/storage/' . $custom->image) }}" alt="digital marketing and advertising agency
                                                                                                                ">
                            <h3>{{ $custom->title }}</h3>
                            @php
                                $amounts = explode(' ', $custom->amount);
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
                                @foreach (preg_split('/\r\n|\r|\n/', $custom->description) as $feature)
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
                                        <li>
                                            <i class="fa-solid fa-check" style="margin-right: 6px;"></i>
                                            <span style="color: black;">{{ $cleanFeature }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            @php
                                $user = auth()->guard('userWeb')->user();
                                $cartItem = null;
                                $inSession = false;

                                if ($user) {
                                    $cartItem = App\Models\Cart::where('user_id', $user->id)
                                        ->where('package_id', $custom->id)
                                        ->first();
                                } else {
                                    $sessionCart = session('cart', []);
                                    foreach ($sessionCart as $item) {
                                        if ($item['package_id'] == $custom->id) {
                                            $inSession = true;
                                            break;
                                        }
                                    }
                                }
                            @endphp
                            <div id="package-{{ $custom->id }}" class="package-wrapper">
                                <form method="POST" action="{{ route('add.to.cart') }}" class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $custom->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn_theme">
                                        @if ($cartItem || $inSession)
                                            Add More
                                        @else
                                            Add To Cart
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="pricing-section ">
        <div class="container">
            <div class="pricing_heading">
                <h2><span class="linear_color">Shopify</span> Development Packages</h2>
                <p>Launch a powerful eCommerce store with our Shopify development packages. We design fast, responsive, and
                    sales-driven Shopify websites tailored to your brand and optimized for conversions.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($shopify as $shop)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $shop->id)}}">
                            <img src="{{ asset('public/storage/' . $shop->image) }}" alt="WordPress Startup Package">
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
                             </a>
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
                                        <li>
                                            <i class="fa-solid fa-check" style="margin-right: 6px;"></i>
                                            <span style="color: black;">{{ $cleanFeature }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>

                             </a>
                            @php
                                $user = auth()->guard('userWeb')->user();
                                $cartItem = null;
                                $inSession = false;

                                if ($user) {
                                    $cartItem = App\Models\Cart::where('user_id', $user->id)
                                        ->where('package_id', $shop->id)
                                        ->first();
                                } else {
                                    $sessionCart = session('cart', []);
                                    foreach ($sessionCart as $item) {
                                        if ($item['package_id'] == $shop->id) {
                                            $inSession = true;
                                            break;
                                        }
                                    }
                                }
                            @endphp
                            <div id="package-{{ $shop->id }}" class="package-wrapper">
                                <form method="POST" action="{{ route('add.to.cart') }}" class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $shop->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn_theme">
                                        @if ($cartItem || $inSession)
                                            Add More
                                        @else
                                            Add To Cart
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="pricing-section py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2><span class="linear_color">Wix Website</span> Packages</h2>
                <p>Build a stunning and easy-to-manage website with our Wix packages. Perfect for small businesses,
                    creatives, and startups seeking a modern design with user-friendly functionality and mobile
                    responsiveness.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($wix as $wixdevelopment)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $wixdevelopment->id)}}">
                            <img src="{{ asset('public/storage/' . $wixdevelopment->image) }}" alt="Wix Starter Package">
                            <h3>{{ $wixdevelopment->title }}</h3>
                            @php
                                $amounts = explode(' ', $wixdevelopment->amount);
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
                                @foreach (preg_split('/\r\n|\r|\n/', $wixdevelopment->description) as $feature)
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
                                        <li>
                                            <i class="fa-solid fa-check" style="margin-right: 6px;"></i>
                                            <span style="color: black;">{{ $cleanFeature }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            @php
                                $user = auth()->guard('userWeb')->user();
                                $cartItem = null;
                                $inSession = false;

                                if ($user) {
                                    $cartItem = App\Models\Cart::where('user_id', $user->id)
                                        ->where('package_id', $wixdevelopment->id)
                                        ->first();
                                } else {
                                    $sessionCart = session('cart', []);
                                    foreach ($sessionCart as $item) {
                                        if ($item['package_id'] == $wixdevelopment->id) {
                                            $inSession = true;
                                            break;
                                        }
                                    }
                                }
                            @endphp
                            <div id="package-{{ $wixdevelopment->id }}" class="package-wrapper">
                                <form method="POST" action="{{ route('add.to.cart') }}" class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $wixdevelopment->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn_theme">
                                        @if ($cartItem || $inSession)
                                            Add More
                                        @else
                                            Add To Cart
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="pricing-section padding_Set py_8 pt-0">
        <div class="container">
            <div class="pricing_heading">
                <h2><span class="linear_color"></span><span class="linear_color"> JAVA/React </span>Packages
                </h2>
                <p>Power your digital products with robust React and Java development. We build high-performance, scalable,
                    and secure web applications tailored to complex business needs and modern user experiences.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($react as $java)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $java->id)}}">
                            <img src="{{ asset('public/storage/' . $java->image) }}" alt="WordPress Startup Package">
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
                                        <li>
                                            <i class="fa-solid fa-check" style="margin-right: 6px;"></i>
                                            <span style="color: black;">{{ $cleanFeature }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            @php
                                $user = auth()->guard('userWeb')->user();
                                $cartItem = null;
                                $inSession = false;

                                if ($user) {
                                    $cartItem = App\Models\Cart::where('user_id', $user->id)
                                        ->where('package_id', $java->id)
                                        ->first();
                                } else {
                                    $sessionCart = session('cart', []);
                                    foreach ($sessionCart as $item) {
                                        if ($item['package_id'] == $java->id) {
                                            $inSession = true;
                                            break;
                                        }
                                    }
                                }
                            @endphp
                            <div id="package-{{ $java->id }}" class="package-wrapper">
                                <form method="POST" action="{{ route('add.to.cart') }}" class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $java->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn_theme">
                                        @if ($cartItem || $inSession)
                                            Add More
                                        @else
                                            Add To Cart
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="pricing-section">
        <div class="container">
            <div class="pricing_heading">
                <h2><span class="linear_color">Creative Graphic Design</span> Packages</h2>
                <p>Enhance your brand identity with our creative graphic design packages. From logos to social media
                    creatives, we deliver stunning visuals that elevate your business presence.</p>
            </div>
            <div class="row justify-content-center">
                @foreach ($graphic as $design)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $design->id)}}">
                            <img src="{{ asset('public/storage/' . $design->image) }}" alt="Graphic Design Starter Package">
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
                                        <li>
                                            <i class="fa-solid fa-check" style="margin-right: 6px;"></i>
                                            <span style="color: black;">{{ $cleanFeature }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            @php
                                $user = auth()->guard('userWeb')->user();
                                $cartItem = null;
                                $inSession = false;
                                if ($user) {
                                    $cartItem = App\Models\Cart::where('user_id', $user->id)
                                        ->where('package_id', $design->id)
                                        ->first();
                                } else {
                                    $sessionCart = session('cart', []);
                                    foreach ($sessionCart as $item) {
                                        if ($item['package_id'] == $design->id) {
                                            $inSession = true;
                                            break;
                                        }
                                    }
                                }
                            @endphp
                            <div id="package-{{ $design->id }}" class="package-wrapper">
                                <form method="POST" action="{{ route('add.to.cart') }}" class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $design->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn_theme">
                                        @if ($cartItem || $inSession)
                                            Add More
                                        @else
                                            Add To Cart
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="pricing-section mt-5">
        <div class="container">
            <div class="pricing_heading">
                <h2>Affordable <span class="linear_color">SEO </span> Packages</h2>
                <p>Boost your online visibility without breaking the bank. Our affordable SEO packages offer keyword
                    optimization, on-page SEO and backlink strategies designed to drive traffic and improve search rankings.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($seo as $seoss)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $seoss->id)}}">
                            <img src="{{ asset('public/storage/' . $seoss->image) }}" alt="WordPress Startup Package">
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
                            <p style="margin-left: 12px;">{{ $seoss->ideal }}</p>
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
                                        <li>
                                            <i class="fa-solid fa-check" style="margin-right: 6px;"></i>
                                            <span style="color: black;">{{ $cleanFeature }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            @php
                                $user = auth()->guard('userWeb')->user();
                                $cartItem = null;
                                $inSession = false;
                                if ($user) {
                                    $cartItem = App\Models\Cart::where('user_id', $user->id)
                                        ->where('package_id', $seoss->id)
                                        ->first();
                                } else {
                                    $sessionCart = session('cart', []);
                                    foreach ($sessionCart as $item) {
                                        if ($item['package_id'] == $seoss->id) {
                                            $inSession = true;
                                            break;
                                        }
                                    }
                                }
                            @endphp
                            <div id="package-{{ $seoss->id }}" class="package-wrapper">
                                <form method="POST" action="{{ route('add.to.cart') }}" class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $seoss->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn_theme">
                                        @if ($cartItem || $inSession)
                                            Add More
                                        @else
                                            Add To Cart
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="pricing-section py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2><span class="linear_color">PPC</span> Advertising Packages</h2>
                <p>Drive instant traffic and leads with our PPC advertising packages. We create and manage high-converting
                    ad campaigns on Google, Bing, and social media tailored to your business goals.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($ppc as $ppcc)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $ppcc->id)}}">
                            <img src="{{ asset('public/storage/' . $ppcc->image) }}" alt="WordPress Startup Package">
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
                             </a>
                            <p style="margin-left: 12px;">{{ $ppcc->ideal }}</p>
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
                                        <li>
                                            <i class="fa-solid fa-check" style="margin-right: 6px;"></i>
                                            <span style="color: black;">{{ $cleanFeature }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            @php
                                $user = auth()->guard('userWeb')->user();
                                $cartItem = null;
                                $inSession = false;
                                if ($user) {
                                    $cartItem = App\Models\Cart::where('user_id', $user->id)
                                        ->where('package_id', $ppcc->id)
                                        ->first();
                                } else {
                                    $sessionCart = session('cart', []);
                                    foreach ($sessionCart as $item) {
                                        if ($item['package_id'] == $ppcc->id) {
                                            $inSession = true;
                                            break;
                                        }
                                    }
                                }
                            @endphp
                            <div id="package-{{ $ppcc->id }}" class="package-wrapper">
                                <form method="POST" action="{{ route('add.to.cart') }}" class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $ppcc->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn_theme">
                                        @if ($cartItem || $inSession)
                                            Add More
                                        @else
                                            Add To Cart
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="pricing-section py_8 pt-0 padding_Set">
        <div class="container">
            <div class="pricing_heading">
                <h2>Best <span class="linear_color">SMO</span> Packages</h2>
                <p>Strengthen your brand presence across social platforms with our best SMO packages. We create engaging
                    content, manage profiles, and boost audience engagement to grow your social media influence.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($smo as $smoss)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $smoss->id)}}">
                            <img src="{{ asset('public/storage/' . $smoss->image) }}" alt="Starter SMO Package">
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
                            <p style="margin-left: 12px;">{{ $smoss->ideal }}</p>
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
                                        <li>
                                            <i class="fa-solid fa-check" style="margin-right: 6px;"></i>
                                            <span style="color: black;">{{ $cleanFeature }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            @php
                                $user = auth()->guard('userWeb')->user();
                                $cartItem = null;
                                $inSession = false;

                                if ($user) {
                                    $cartItem = App\Models\Cart::where('user_id', $user->id)
                                        ->where('package_id', $smoss->id)
                                        ->first();
                                } else {
                                    $sessionCart = session('cart', []);
                                    foreach ($sessionCart as $item) {
                                        if ($item['package_id'] == $smoss->id) {
                                            $inSession = true;
                                            break;
                                        }
                                    }
                                }
                            @endphp
                            <div id="package-{{ $smoss->id }}" class="package-wrapper">
                                <form method="POST" action="{{ route('add.to.cart') }}" class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $smoss->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn_theme">
                                        @if ($cartItem || $inSession)
                                            Add More
                                        @else
                                            Add To Cart
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="pricing-section py_8 pt-0 padding_Set">
        <div class="container">
            <div class="pricing_heading">
                <h2><span class="linear_color">Email Marketing</span> &amp; Packages</h2>
                <p>Reach your audience directly with our result-driven email marketing packages. We craft engaging
                    campaigns, automate workflows, and track performance to boost open rates, clicks, and customer
                    conversions.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($emailMarkeitng as $email)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                             <a href="{{route('productdetail', $email->id)}}">
                            <img src="{{ asset('public/storage/' . $email->image) }}"
                                alt="digital marketing and advertising agency                                                                                                                                                         ">
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
                                        <li>
                                            <i class="fa-solid fa-check" style="margin-right: 6px;"></i>
                                            <span style="color: black;">{{ $cleanFeature }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            @php
                                $user = auth()->guard('userWeb')->user();
                                $cartItem = null;
                                $inSession = false;

                                if ($user) {
                                    $cartItem = App\Models\Cart::where('user_id', $user->id)
                                        ->where('package_id', $email->id)
                                        ->first();
                                } else {
                                    $sessionCart = session('cart', []);
                                    foreach ($sessionCart as $item) {
                                        if ($item['package_id'] == $email->id) {
                                            $inSession = true;
                                            break;
                                        }
                                    }
                                }
                            @endphp
                            <div id="package-{{ $email->id }}" class="package-wrapper">
                                <form method="POST" action="{{ route('add.to.cart') }}" class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $email->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn_theme">
                                        @if ($cartItem || $inSession)
                                            Add More
                                        @else
                                            Add To Cart
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="weekly_best_selling py_8">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="weekly_best_txt">
                        <h2>Weekly Best-Selling Products</h2>
                        <p>Discover Pro Web Shop's top-selling products of the week! Handpicked by our customers, these
                            trending items combine quality, value, and popularity—perfect for boosting your sales and
                            staying ahead in the market. Shop the best now!
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="btn_weekly">
                        <a href="{{ route('contact.us') }}">
                            <button class="btn_theme btn_blog">Contact Us</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="feature_product py_8"
        style="background-image: url({{ asset('public/frontend/img/pattern-curve-four.png') }});">
        <div class="container">
            <div class="pricing_heading">
                <h2>Featured <span class="linear_color">Products</span></h2>
                <p>Explore our handpicked selection of top web themes & templates for this month. Curated by experts,
                    these premium designs help you build stunning websites effortlessly!</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/php_icon.png') }}"
                                alt="best digital marketing services                                                               ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>PHP Laravel Website </h3>
                            <p>Build secure, scalable, and high-performing web applications with our PHP Laravel
                                development services. We create custom, feature-rich websites tailored to your business
                                needs, ensuring seamless functionality and an excellent user experience.</p>
                            <div class="btn_feature_product">
                                <a href="{{ route('php-laravel-website') }}">View Profile <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/react_icon.png') }}"
                                alt="digital marketing agency                                                               ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>React & Java Development</h3>
                            <p>Build secure, scalable, and high-performing web applications with our PHP Laravel
                                development services. We create custom, feature-rich websites tailored to your business
                                needs, ensuring seamless functionality and an excellent user experience.</p>
                            <div class="btn_feature_product">
                                <a href="{{ route('react-java-website') }}">View Profile <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/shopify_icon.png') }}"
                                alt="digital marketing and advertising agency                                                                                               ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Shopify Website Development</h3>
                            <p>Build secure, scalable, and high-performing web applications with our PHP Laravel
                                development services. We create custom, feature-rich websites tailored to your business
                                needs, ensuring seamless functionality and an excellent user experience.</p>
                            <div class="btn_feature_product">
                                <a href="{{ route('shopify-development') }}">View Profile <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/webflow_icon.png') }}" alt="web service packages
                                                                                                        ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Webflow Website Development</h3>
                            <p>Build secure, scalable, and high-performing web applications with our PHP Laravel
                                development services. We create custom, feature-rich websites tailored to your business
                                needs, ensuring seamless functionality and an excellent user experience.</p>
                            <div class="btn_feature_product">
                                <a href="{{ route('webflow-development') }}">View Profile <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/wix_icon.png') }}" alt="best digital marketing services
                                                                                                        ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>Wix Website Development</h3>
                            <p>Build secure, scalable, and high-performing web applications with our PHP Laravel
                                development services. We create custom, feature-rich websites tailored to your business
                                needs, ensuring seamless functionality and an excellent user experience.</p>
                            <div class="btn_feature_product">
                                <a href="{{ route('wix-website-development') }}">View Profile <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="feature_under_product">
                        <div class="product_icon">
                            <img src="{{ asset('public/frontend/img/wordpress_icon.png') }}" alt="digital marketing agency
                                                                                                        ">
                        </div>
                        <div class="txt_feture_product">
                            <h3>WordPress Website Development</h3>
                            <p>Build secure, scalable, and high-performing web applications with our PHP Laravel
                                development services. We create custom, feature-rich websites tailored to your business
                                needs, ensuring seamless functionality and an excellent user experience.</p>
                            <div class="btn_feature_product">
                                <a href="{{ route('wordpress-website-development') }}">View Profile <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="top_performance_main py_8">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                        <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <div class="php_package package_design">
                                <h3>Webflow Website Development</h3>
                                <p class=""><span class="counter" data-target="350">0</span>+<span>subscriptions</span></p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <div class="react_package package_design">
                                <h3>React & Java Development</h3>
                                <p><span class="counter" data-target="480">0</span>+ <span>subscriptions</span></p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <div class="wix_package package_design">
                                <h3>Wix Website Development</h3>
                                <p><span class="counter" data-target="270">0</span>+ <span>subscriptions</span></p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <div class="shopify_package package_design">
                                <h3>Shopify Website Development</h3>
                                <p><span class="counter" data-target="190">0</span>+ <span>subscriptions</span></p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="text_top_performance">
                        <h2>Top Performance</h2>
                        <p>With our optimized solutions, you can experience top-tier speed, reliability, and efficiency.
                            We ensure seamless functionality and high performance for your digital products. Elevate
                            your website’s user experience with cutting-edge technology!</p>
                        {{-- <div class="btn_performance">
                            <button class="btn_theme"><a href="#">Get Started</a></button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest_blog_sec py_8"
        style="background-image: url({{ asset('public/frontend/img/pattern-curve-four.png') }});">
        <div class="container">
            <div class="flex_bloging_heading">
                <h2>Browse All <span class="linear_color">Latest </span><span class="linear_color">Blogs</span></h2>
                <div class="btn_latest_all">
                    <a href="{{ route('blogs') }}">
                        <button class="btn_theme">Browse All Blogs</button>
                    </a>
                </div>
            </div>

            <div class="owl-carousel owl-theme" id="blog-carousel">


                @foreach ($blogssss as $blogD)
                    <div class="item">
                        <div class="blog-section">
                            <div class="blog-card">
                                <img src="{{ asset('public/storage/' . $blogD->image) }}" alt="Blog Image"
                                    style="height: 300px;">

                                <div class="blog-content">
                                    <h4>{{ \Illuminate\Support\Str::limit($blogD->title, 25, '...') }}</h4>
                                    <p>Hiring | <i class="fa-regular fa-calendar"></i>
                                        {{ $blogD->created_at->format('d F Y') }}</p>

                                    <div class="btn_read_more_blog">
                                        <a href="{{ route('blog-detail', $blogD->slug ?? '') }}">
                                            <button class="btn_theme btn_blog">Read More</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="earning_prowebshop py_8">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card light-purple"
                        style="background-image: url({{ asset('public/frontend/img/seller-bg.png') }});">
                        <h2>Maximize Your Earnings with Pro Web Shop</h2>
                        <p>Maximize your earnings with Pro Web Shop! Our powerful e-commerce solutions help you boost
                            sales, attract customers, and streamline operations for ultimate business growth.</p>
                        <div class="btn_earnings">
                            <a href="{{ route('contact.us') }}">
                                <button class="btn_theme btn_blog">Contact</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card light-pink"
                        style="background-image: url({{ asset('public/frontend/img/seller-bg.png') }});">
                        <h2>Start Earning Today</h2>
                        <p>Start earning today with our expert solutions! Boost your income, grow your business, and
                            unlock new opportunities with powerful tools designed for success.</p>
                        <div class="btn_earnings">
                            <a href="{{ route('contact.us') }}">
                                <button class="btn_theme btn_blog">Contact</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="supportive_sec py_8 pt-0 ">
        <div class="container">
            <div class="row align-items-center g-0">
                <div class="col-md-4">
                    <div class="support-section">
                        <div class="support-image">
                            <img src="{{ asset('public/frontend/img/support-img.png') }}" alt="best digital marketing services
                                                                                                        ">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="support-section">
                        <div class="support-image">
                            <img src="{{ asset('public/frontend/img/arrow-shape.png') }}" alt="digital marketing agency">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="support-content"
                        style="background-image: url({{ asset('public/frontend/img/spider-net-sm.png') }});">
                        <h2>Support 24/7</h2>
                        <p>Wanna talk? Send us a message</p>
                        <button class="btn_theme btn_blog"><a
                                href="mailto:info@prowebshop.online">Info@Prowebshop.Online</a></button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


@endsection
