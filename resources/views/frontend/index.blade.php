@extends('frontend.layout.app')

@section('content')
    <section class="hero_banner">
        <div class="owl-carousel hero_banners owl-theme">

            <!-- Slide 1 -->
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
                                            <button class="btn_theme">Contact Us</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="hero_banner_img">
                                    <img src="{{ asset('public/frontend/img/Gif-mockup22 (1).gif') }}" alt="Slide 1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="item">
                <div class="banner_slide">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="banner_txt_hero">
                                    <h1>Grow Your Business Online</h1>
                                    <p>Boost your online presence with our expert digital marketing services. From SEO,
                                        PPC, and social media marketing to content creation, we help you drive traffic,
                                        increase engagement, and grow your brand. Get results that matter!</p>
                                    <div class="btn_hero_btn">
                                        <a href="{{ route('contact.us') }}">
                                            <button class="btn_theme">
                                                Contact Us</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="hero_banner_img">
                                    <img src="{{ asset('public/frontend/img/Loan-SuvidhaGIF (1).gif') }}" alt="Slide 2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="item">
                <div class="banner_slide">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="banner_txt_hero">
                                    <h1>SEO, PPC & More</h1>
                                    <p>Boost your online presence with our expert digital marketing services. From SEO,
                                        PPC, and social media marketing to content creation, we help you drive traffic,
                                        increase engagement, and grow your brand. Get results that matter!</p>
                                    <div class="btn_hero_btn">
                                        <a href="{{ route('contact.us') }}">
                                            <button class="btn_theme">Contact
                                                Us</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="hero_banner_img">
                                    <img src="{{ asset('public/frontend/img/babycorngif (1).gif') }}" alt="Slide 3">
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

    <!------------------------------------ Php Laravel Start--------------------------------->
    <section class="pricing-section">
        <div class="container">
            <div class="pricing_heading">
                <!-- <h2>Select The <span class="linear_color">Package</span> That Fits You Best</h2> -->
                <h2><span class="linear_color">PHP Laravel</span> Website Development Packages</h2>
                <p>Website Design Innovation provides various packages for WordPress development. Our packages aim to offer
                    you
                    the utmost flexibility while fulfilling your website needs.</p>
            </div>
            <div class="row">
                @foreach ($php as $laravel)
                    <div class="col-md-4">
                        <div class="pricing-card">
                            <img src="{{ asset('public/storage/' . $laravel->image) }}" alt="Laravel Startup Package">
                            <h3>{{ $laravel->title }}</h3>
                            @php
                                // Split the string by space
                                $amounts = explode(' ', $laravel->amount);
                                $firstAmount = $amounts[0] ?? '';
                                $secondAmount = $amounts[1] ?? '';
                            @endphp

                            <p class="price">
                                <span>Cost:</span>
                                <span>{{ $firstAmount }}</span>
                                @if ($secondAmount)
                                    <del>{{ $secondAmount }}</del>
                                @endif
                            </p>

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
                                    $cartItem = App\Models\Cart::where('user_id', $user->id)
                                        ->where('package_id', $laravel->id)
                                        ->first();
                                }
                            @endphp

                            <div id="package-{{ $laravel->id }}" class="package-wrapper">
                                @unless ($cartItem)
                                    <form method="POST" action="{{ route('add.to.cart') }}"
                                        class="d-flex align-items-center">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $laravel->id }}">
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
    <!------------------------------------ Php Laravel End--------------------------------->

    <!------------------------------------ Webflow Development Start--------------------------------->
    <section class="pricing-section py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2>Webflow <span class="linear_color">Website Development</span> Services Packages</h2>
                <p>Whether you're building a portfolio, business site, or a high-converting landing page, our Webflow
                    packages
                    are crafted to suit your scalability and performance needs.</p>
            </div>
            <div class="row">

                <!-- Starter Package -->
                @foreach ($webFlow as $web)
                    <div class="col-md-4">
                        <div class="pricing-card">
                            <img src="{{ asset('public/storage/' . $web->image) }}" alt="Web Flow Package">
                            <h3>{{ $web->title }}</h3>
                            @php
                                // Split the string by space
                                $amounts = explode(' ', $web->amount);
                                $firstAmount = $amounts[0] ?? '';
                                $secondAmount = $amounts[1] ?? '';
                            @endphp

                            <p class="price">
                                <span>Cost:</span>
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
                {{-- <div class="col-md-4">
                    <div class="pricing-card">
                        <img src="{{ asset('public/frontend/img/webflow22.png') }}" alt="Webflow Basic Package">
                        <h3>Basic Package</h3>
                        <p class="price"><span> Cost:</span> $290 <del>$500</del></p>
                        <ul>
                            <li><i class="fa-solid fa-check"></i> Includes Everything in Starter</li>
                            <li><i class="fa-solid fa-check"></i> Webflow CMS with Dynamic Collections</li>
                            <li><i class="fa-solid fa-check"></i> Custom UI/UX with Interactive Animations</li>
                            <li><i class="fa-solid fa-check"></i> Up to 10 Pages with Modular Design</li>
                            <li><i class="fa-solid fa-check"></i> E-Commerce Setup (Basic Storefront, Payment Integration)
                            </li>
                            <li><i class="fa-solid fa-check"></i> Advanced SEO (Schema Markup, Open Graph, Social Sharing
                                Tags)</li>
                            <li><i class="fa-solid fa-check"></i> Blog/News Section with Easy Content Management</li>
                            <li><i class="fa-solid fa-check"></i> Custom Contact & Multi-Step Forms with Zapier Integration
                            </li>
                            <li><i class="fa-solid fa-check"></i> CRM Integration (HubSpot, Salesforce, Zoho, etc.)</li>
                            <li><i class="fa-solid fa-check"></i> Newsletter & Email Marketing Integration</li>
                            <li><i class="fa-solid fa-check"></i> Performance Enhancements (Lazy Loading, Minified Code)
                            </li>
                            <li><i class="fa-solid fa-check"></i> Custom JavaScript & CSS Enhancements</li>
                            <li><i class="fa-solid fa-check"></i> Cloudflare CDN & Security Hardening</li>
                            <li><i class="fa-solid fa-check"></i> Automated Backups & Version Control</li>
                            <li><i class="fa-solid fa-check"></i> Deployment Assistance & Webflow Hosting Setup</li>
                            <li><i class="fa-solid fa-check"></i> 2 Months Free Support & Maintenance</li>
                        </ul>
                        <div class="btn_pricing_cards">
                            <button class="btn_theme"><a href="#">Add to cart</a></button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="pricing-card">
                        <img src="{{ asset('public/frontend/img/webflow22.png') }}" alt="Webflow Corporate Package">
                        <h3>Corporate Package</h3>
                        <p class="price"><span> Cost:</span> $500 <del>$850</del></p>
                        <ul>
                            <li><i class="fa-solid fa-check"></i> Includes Everything in Basic</li>
                            <li><i class="fa-solid fa-check"></i> Enterprise-Grade Webflow Development with Custom
                                Integrations</li>
                            <li><i class="fa-solid fa-check"></i> Unlimited Pages & Multi-Language Support (i18n)</li>
                            <li><i class="fa-solid fa-check"></i> Advanced Motion Graphics & Web Animations</li>
                            <li><i class="fa-solid fa-check"></i> Custom Web Applications with API Integrations</li>
                            <li><i class="fa-solid fa-check"></i> Headless CMS & External Data Source Integration</li>
                            <li><i class="fa-solid fa-check"></i> E-Commerce with Advanced Filters & Custom Checkout</li>
                            <li><i class="fa-solid fa-check"></i> AI-Powered Personalization & Chatbot Integration</li>
                            <li><i class="fa-solid fa-check"></i> Custom Webflow Components & Plugins Development</li>
                            <li><i class="fa-solid fa-check"></i> Real-Time Analytics Dashboards & A/B Testing</li>
                            <li><i class="fa-solid fa-check"></i> Advanced Cybersecurity (DDoS, WAF)</li>
                            <li><i class="fa-solid fa-check"></i> Custom API Development & Third-Party Integrations</li>
                            <li><i class="fa-solid fa-check"></i> Enterprise CRM, ERP, Workflow Automation</li>
                            <li><i class="fa-solid fa-check"></i> High-Traffic Optimization with Serverless Backend</li>
                            <li><i class="fa-solid fa-check"></i> Dedicated Account Manager & 24/7 Priority Support</li>
                            <li><i class="fa-solid fa-check"></i> 6 Months Free Support, Maintenance & Monitoring</li>
                        </ul>
                        <div class="btn_pricing_cards">
                            <button class="btn_theme"><a href="#">Add to cart</a></button>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </section>
    <!------------------------------------ Webflow Development End--------------------------------->


    <!------------------------------------ Wordpress Start--------------------------------->
    <section class="pricing-section">
        <div class="container">
            <div class="pricing_heading">
                <h2>Select the Package That Fits You Best</h2>
                <p>Please select from our flexible digital marketing packages designed to suit every business's needs and
                    budget. Whether you're a startup or an established brand, Pro Web Shop has the perfect plan to elevate
                    your online success.
                </p>
            </div>
            <div class="row">
                @foreach ($wordpress as $word)
                    <div class="col-md-4">
                        <div class="pricing-card">
                            <img src="{{ asset('public/storage/' . $word->image) }}" alt="WordPress Startup Package">
                            <h3>{{ $word->title }}</h3>
                            @php
                                $amounts = explode(' ', $word->amount);
                                $firstAmount = $amounts[0] ?? '';
                                $secondAmount = $amounts[1] ?? '';
                            @endphp

                            <p class="price">
                                <span>Cost:</span>
                                <span>{{ $firstAmount }}</span>
                                @if ($secondAmount)
                                    <del>{{ $secondAmount }}</del>
                                @endif
                            </p>
                            <p style="margin-left: 12px;"><strong>Ideal For:</strong> {{ $word->ideal }}</p>

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
                                    <form method="POST" action="{{ route('add.to.cart') }}"
                                        class="d-flex align-items-center">
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
    <!------------------------------------ Wordpress End--------------------------------->

    <!------------------------------------ Custom Design Start--------------------------------->
    <section class="pricing-section py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2>Inspiring Designs With Budget-Friendly Packages</h2>
                <p>At Pro Web Shop, we create stunning, professional designs tailored to your brand—without breaking the
                    bank. Get creative excellence and affordability in one perfect package.
                </p>
            </div>
            <div class="row">
                @foreach ($customDevelopment as $custom)
                    <div class="col-md-4">
                        <div class="pricing-card">
                            <img src="{{ asset('public/storage/' . $custom->image) }}" alt="WordPress Startup Package">
                            <h3>{{ $custom->title }}</h3>
                            @php
                                $amounts = explode(' ', $custom->amount);
                                $firstAmount = $amounts[0] ?? '';
                                $secondAmount = $amounts[1] ?? '';
                            @endphp

                            <p class="price">
                                <span>Cost:</span>
                                <span>{{ $firstAmount }}</span>
                                @if ($secondAmount)
                                    <del>{{ $secondAmount }}</del>
                                @endif
                            </p>
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
                                        ->where('package_id', $custom->id)
                                        ->first();
                                }
                            @endphp

                            <div id="package" class="package-wrapper">
                                @unless ($cartItem)
                                    <form method="POST" action="{{ route('add.to.cart') }}"
                                        class="d-flex align-items-center">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $custom->id }}">
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
    <!------------------------------------ Custom Design End--------------------------------->

    <!------------------------------------ Shopify Start--------------------------------->
    <section class="pricing-section ">
        <div class="container">
            <div class="pricing_heading">
                <h2>Choose a Budget Plan That Suits Your Needs</h2>
                <p>Pro Web Shop offers customizable budget plans to match your business goals. Whether you're just starting
                    or scaling up, our affordable solutions ensure you get the best value for every investment.
                </p>
            </div>
            <div class="row">
                @foreach ($shopify as $shop)
                    <div class="col-md-4">
                        <div class="pricing-card">
                            <img src="{{ asset('public/storage/' . $shop->image) }}" alt="WordPress Startup Package">
                            <h3>{{ $shop->title }}</h3>
                            @php
                                $amounts = explode(' ', $shop->amount);
                                $firstAmount = $amounts[0] ?? '';
                                $secondAmount = $amounts[1] ?? '';
                            @endphp

                            <p class="price">
                                <span>Cost:</span>
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
    <!------------------------------------ Shopify End--------------------------------->

    <!-- ======================================= WIX DEVELOPMENT START ============================================== -->
    <section class="pricing-section py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2><span class="linear_color">Wix</span> Website Development Packages</h2>
                <p>Professional Wix design and development solutions tailored to your business needs. Scalable, SEO-ready,
                    and
                    optimized for performance and conversion.</p>
            </div>
            <div class="row">
                @foreach ($wix as $wixdevelopment)
                    <div class="col-md-4">
                        <div class="pricing-card">
                            <img src="{{ asset('public/storage/' . $wixdevelopment->image) }}" alt="Wix Starter Package">
                            <h3>{{ $wixdevelopment->title }}</h3>
                            @php
                                $amounts = explode(' ', $wixdevelopment->amount);
                                $firstAmount = $amounts[0] ?? '';
                                $secondAmount = $amounts[1] ?? '';
                            @endphp

                            <p class="price">
                                <span>Cost:</span>
                                <span>{{ $firstAmount }}</span>
                                @if ($secondAmount)
                                    <del>{{ $secondAmount }}</del>
                                @endif
                            </p>
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
                                        ->where('package_id', $wixdevelopment->id)
                                        ->first();
                                }
                            @endphp

                            <div id="package" class="package-wrapper">
                                @unless ($cartItem)
                                    <form method="POST" action="{{ route('add.to.cart') }}"
                                        class="d-flex align-items-center">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $wixdevelopment->id }}">
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
    <!-- ======================================= WIX DEVELOPMENT END ============================================== -->

    <!-- ======================================= React -Java START ============================================== -->
    <section class="pricing-section py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2><span class="linear_color"></span><span class="linear_color"> React - Java </span>Website Development
                    Packages
                </h2>
                <p>We understand that every online store comes with its unique challenges, goals, and aspirations. That's
                    why
                    we've created multiple plans to accommodate your budget and requirements, whether it's full-time,
                    part-time,
                    or on-demand.</p>
            </div>
            <div class="row">
                @foreach ($react as $java)
                    <div class="col-md-4">
                        <div class="pricing-card">
                            <img src="{{ asset('public/storage/' . $java->image) }}" alt="WordPress Startup Package">
                            <h3>{{ $java->title }} </h3>
                            @php
                                $amounts = explode(' ', $java->amount);
                                $firstAmount = $amounts[0] ?? '';
                                $secondAmount = $amounts[1] ?? '';
                            @endphp

                            <p class="price">
                                <span>Cost:</span>
                                <span>{{ $firstAmount }}</span>
                                @if ($secondAmount)
                                    <del>{{ $secondAmount }}</del>
                                @endif
                            </p>
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
    <!-- ======================================= React - Java End ============================================== -->

    <!-- ======================================= Graphics Design START ============================================== -->
    <section class="pricing-section">
        <div class="container">
            <div class="pricing_heading">
                <h2>Creative <span class="linear_color">Graphic Design Packages</span></h2>
                <p>Whether you're starting out or scaling up, our design packages are tailored to suit every business's
                    visual
                    needs.</p>
            </div>
            <div class="row">
                @foreach ($graphic as $design)
                    <div class="col-md-4">
                        <div class="pricing-card">
                            <img src="{{ asset('public/storage/' . $design->image) }}"
                                alt="Graphic Design Starter Package">
                            <h3>{{ $design->title }}</h3>
                            @php
                                $amounts = explode(' ', $design->amount);
                                $firstAmount = $amounts[0] ?? '';
                                $secondAmount = $amounts[1] ?? '';
                            @endphp

                            <p class="price">
                                <span>Cost:</span>
                                <span>{{ $firstAmount }}</span>
                                @if ($secondAmount)
                                    <del>{{ $secondAmount }}</del>
                                @endif
                            </p>
                            <p style="margin-left: 12px;"><strong>Ideal For:</strong> {{ $design->ideal }}</p>
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
    <!-- ======================================= Graphics Design End ============================================== -->

    <!-- ======================================= SEO START ============================================== -->
    <section class="pricing-section mt-5">
        <div class="container">
            <div class="pricing_heading">
                <h2>SEO Services</h2>
                <p>Boost your website's visibility with Pro Web Shop's expert SEO services. We offer comprehensive on-page,
                    off-page, and technical SEO strategies to enhance rankings, drive organic traffic, and effectively and
                    sustainably grow your online presence.
                </p>
            </div>
            <div class="row">
                @foreach ($seo as $seoss)
                    <div class="col-md-4">
                        <div class="pricing-card">
                            <img src="{{ asset('public/storage/' . $seoss->image) }}" alt="WordPress Startup Package">
                            <h3>{{ $seoss->title }}</h3>
                            @php
                                $amounts = explode(' ', $seoss->amount);
                                $firstAmount = $amounts[0] ?? '';
                                $secondAmount = $amounts[1] ?? '';
                            @endphp

                            <p class="price">
                                <span>Cost:</span>
                                <span>{{ $firstAmount }}</span>
                                @if ($secondAmount)
                                    <del>{{ $secondAmount }}</del>
                                @endif
                            </p>
                            <p style="margin-left: 12px;"><strong>Ideal For:</strong> {{ $seoss->ideal }}</p>
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
    <!-- ======================================= SEO End ============================================== -->

    <!-- ======================================= PPC START ============================================== -->
    <section class="pricing-section py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2>PPC Services</h2>
                <p>Maximize your ROI with Pro Web Shop’s result-driven PPC services. Our expert team creates targeted ad
                    campaigns on Google, Bing, and social platforms to drive instant traffic, leads, and conversions for
                    your business.
                </p>
            </div>
            <div class="row">
                @foreach ($ppc as $ppcc)
                    <div class="col-md-4">
                        <div class="pricing-card">
                            <img src="{{ asset('public/storage/' . $ppcc->image) }}" alt="WordPress Startup Package">
                            <h3>{{ $ppcc->title }}</h3>
                            @php
                                $amounts = explode(' ', $ppcc->amount);
                                $firstAmount = $amounts[0] ?? '';
                                $secondAmount = $amounts[1] ?? '';
                            @endphp

                            <p class="price">
                                <span>Cost:</span>
                                <span>{{ $firstAmount }}</span>
                                @if ($secondAmount)
                                    <del>{{ $secondAmount }}</del>
                                @endif
                            </p>
                            <p style="margin-left: 12px;"><strong>Ideal For:</strong> {{ $ppcc->ideal }}</p>
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
                                        ->where('package_id', $ppcc->id)
                                        ->first();
                                }
                            @endphp

                            <div id="package" class="package-wrapper">
                                @unless ($cartItem)
                                    <form method="POST" action="{{ route('add.to.cart') }}"
                                        class="d-flex align-items-center">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $ppcc->id }}">
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
    <!-- ======================================= PPC End ============================================== -->

    <!-- ======================================= SMO Start ============================================== -->
    <section class="pricing-section py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2><span class="linear_color">SMO</span> Services Packages</h2>
                <p>Boost your brand's visibility, engagement, and influence with our strategic social media optimization
                    packages tailored for startups, growing businesses, and enterprise brands.</p>
            </div>
            <div class="row">
                @foreach ($smo as $smoss)
                    <div class="col-md-4">
                        <div class="pricing-card">
                            <img src="{{ asset('public/storage/' . $smoss->image) }}" alt="Starter SMO Package">
                            <h3>{{ $smoss->title }}</h3>
                            @php
                                $amounts = explode(' ', $smoss->amount);
                                $firstAmount = $amounts[0] ?? '';
                                $secondAmount = $amounts[1] ?? '';
                            @endphp

                            <p class="price">
                                <span>Cost:</span>
                                <span>{{ $firstAmount }}</span>
                                @if ($secondAmount)
                                    <del>{{ $secondAmount }}</del>
                                @endif
                            </p>
                            <p style="margin-left: 12px;"><strong>Ideal For:</strong> {{ $smoss->ideal }}</p>
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
    <!-- ======================================= SMO End ============================================== -->

    <!-- ======================================= Email Marketing Start ============================================== -->
    <section class="pricing-section py_8">
        <div class="container">
            <div class="pricing_heading">
                <h2><span class="linear_color">Email Marketing</span> &amp; Bulk SMS Services</h2>
                <p>Our direct marketing solutions are built to scale — whether you're starting your email list or managing
                    thousands of contacts. Choose the package that fits your campaign goals and outreach needs.</p>
            </div>
            <div class="row">
                @foreach ($emailMarkeitng as $email)
                    <div class="col-md-4">
                        <div class="pricing-card">
                            <img src="{{ asset('public/storage/' . $email->image) }}" alt="Starter Email & SMS Package">
                            <h3>{{ $email->title }}</h3>
                            @php
                                $amounts = explode(' ', $email->amount);
                                $firstAmount = $amounts[0] ?? '';
                                $secondAmount = $amounts[1] ?? '';
                            @endphp

                            <p class="price">
                                <span>Cost:</span>
                                <span>{{ $firstAmount }}</span>
                                @if ($secondAmount)
                                    <del>{{ $secondAmount }}</del>
                                @endif
                            </p>
                            <p style="margin-left: 12px;"><strong>Ideal For:</strong> {{ $email->ideal }}</p>
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

    <!-- ======================================= Email Marketing End ============================================== -->

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
                            <button class="btn_theme">Contact Us</button>
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
                            <img src="{{ asset('public/frontend/img/php_icon.png') }}" alt="">
                        </div>
                        <div class="txt_feture_product">
                            <h3>PHP Laravel Website Development</h3>
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
                            <img src="{{ asset('public/frontend/img/react_icon.png') }}" alt="">
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
                            <img src="{{ asset('public/frontend/img/shopify_icon.png') }}" alt="">
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
                            <img src="{{ asset('public/frontend/img/webflow_icon.png') }}" alt="">
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
                            <img src="{{ asset('public/frontend/img/wix_icon.png') }}" alt="">
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
                            <img src="{{ asset('public/frontend/img/wordpress_icon.png') }}" alt="">
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
                <div class="col-md-6">
                    <div class="img_top_performance">
                        <img src="{{ asset('public/frontend/img/flower.gif') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
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
                <h2>Browse All <span class="linear_color">Latest</span> <br><span class="linear_color">Blogs</span>
                </h2>
                <div class="btn_latest_all">
                    <a href="{{ route('blogs') }}">
                        <button class="btn_theme">Browse All Blogs</button>
                    </a>
                </div>
            </div>
            <div class="row">
                @foreach ($blogssss as $blogD)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="blog-section">
                            <div class="blog-card">
                                <img src="{{ asset('public/storage/' . $blogD->image) }}" alt="Blog 1"
                                    style=" height: 300px; ">

                                <div class="blog-content">
                                    <h4>{{ \Illuminate\Support\Str::words($blogD->title, 9, '...') }}</h4>
                                    <p>Hiring | <i class="fa-regular fa-calendar"></i>
                                        {{ $blogD->created_at->format('d F Y') }}</p>

                                    <div class="btn_read_more_blog">
                                        <button class="btn_theme"><a href="#">Read More</a></button>
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
                <div class="col-md-6">
                    <div class="card light-purple"
                        style="background-image: url({{ asset('public/frontend/img/seller-bg.png') }});">
                        <h2>Maximize Your Earnings with Pro Web Shop</h2>
                        <p>Maximize your earnings with Pro Web Shop! Our powerful e-commerce solutions help you boost
                            sales, attract customers, and streamline operations for ultimate business growth.</p>
                        <div class="btn_earnings">
                            <a href="{{ route('contact.us') }}">
                                <button class="btn_theme">Contact</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card light-pink"
                        style="background-image: url({{ asset('public/frontend/img/seller-bg.png') }});">
                        <h2>Start Earning Today</h2>
                        <p>Start earning today with our expert solutions! Boost your income, grow your business, and
                            unlock new opportunities with powerful tools designed for success.</p>
                        <div class="btn_earnings">
                            <a href="{{ route('contact.us') }}">
                                <button class="btn_theme">Contact</button>
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
                            <img src="{{ asset('public/frontend/img/support-img.png') }}" alt="Support">
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="support-section">
                        <div class="support-image">
                            <img src="{{ asset('public/frontend/img/arrow-shape.png') }}" alt="Support">
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="support-content"
                        style="background-image: url({{ asset('public/frontend/img/spider-net-sm.png') }});">
                        <h2>Support 24/7</h2>
                        <p>Wanna talk? Send us a message</p>
                        <button class="btn_theme"><a
                                href="mailto:info@prowebshop.online btn_theme">Info@Prowebshop.Online</a></button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    {{--
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
                                // Replace the "Add to Cart" form with + / - UI
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
    </script> --}}
@endsection
