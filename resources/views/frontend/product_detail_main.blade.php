@extends('frontend.layout.app')
@section('content')

    <section class="banner_about_us py_8"
        style="background-image: url({{ asset('public/frontend/img/about_banner.png') }});">
        <div class="container">
            <div class="row">
                <div class="text_about_us">
                    <h2>Product Detail</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="single_product_one py_8">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="product-container">
                        <h2>Packages</h2>
                        <h3>What’s Included in the WordPress Startup Package?</h3>
                        <p class="special-price">Special Price</p>
                        <p class="price">₹279 <span class="old-price">₹1,599</span> <span class="discount">82% off</span>
                        </p>
                        <p class="rating">⭐ 3.9 | 6,087 ratings and 204 reviews</p>


                        <div class="size-section">
                            <p>Technology Stack</p>
                            <div class="size-options">
                                <button>PHP</button>
                                <button>Laravel</button>
                                <button>React</button>
                            </div>
                        </div>

                        <div class="size-section">
                            <p>Package Type</p>
                            <div class="size-options">
                                <button>Startup</button>
                                <button>Basic</button>
                                <button>Corporate</button>
                            </div>
                        </div>
                        <div class="offers">
                            <p><img src="{{ asset('frontend/img/icon_product_mini.webp') }}" alt=""><b> Offer</b> 5%
                                Unlimited Cashback on Flipkart Axis Bank Credit Card</p>
                            <p><img src="{{ asset('frontend/img/icon_product_mini.webp') }}" alt=""><b> Offer</b> 10% off up
                                to ₹1,250 on HDFC Bank Credit Card Transactions</p>
                            <p><img src="{{ asset('frontend/img/icon_product_mini.webp') }}" alt=""><b> Offer</b> 10% off up
                                to ₹1,500 on HDFC Bank Credit Card EMI Transactions</p>
                            <p><img src="{{ asset('frontend/img/icon_product_mini.webp') }}" alt=""><b> Offer</b> Buy 2 or
                                more items save ₹20</p>
                        </div>
                        <button class="btn_theme mt-3 btn_blog"><a href="#">Add to cart</a></button>
                        <div>
                            <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active heading_description" id="desc-tab" data-bs-toggle="tab"
                                        data-bs-target="#desc" type="button" role="tab"
                                        aria-selected="true">Description</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link heading_description" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"
                                        type="button" role="tab" aria-selected="false" tabindex="-1">Review</button>
                                </li>
                            </ul>
                            <div class="tab-content p-3 border border-top-0 mb-4 decrip_content " id="myTabContent">
                                <div class="tab-pane fade active show" id="desc" role="tabpanel" aria-labelledby="desc-tab">
                                    <div class="seller_product_mini">
                                        <div class="highlight_ram">
                                            <div class="highlight_column">
                                                <h3>Highlights</h3>
                                                <ul>
                                                    <li>WordPress Installation & Theme Setup</li>
                                                    <li>5 Page Website (Home, About, Services, Blog, Contact)</li>
                                                    <li>Responsive & Mobile Friendly Design</li>
                                                    <li>Free SSL & Hosting Setup Assistance</li>
                                                    <li>Basic SEO Optimization</li>
                                                </ul>
                                            </div>
                                            <div class="highlight_column">
                                                <h3>Easy Payment Options</h3>
                                                <ul>
                                                    <li>No cost EMI starting from ₹5,334/month</li>
                                                    <li>Cash on Delivery</li>
                                                    <li>Net banking & Credit/ Debit/ ATM card</li>
                                                    <li><a href="#">View Details</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="seller-info">
                                        <h3>Seller</h3>
                                        <a href="#">IndiFlashMart</a> <span class="rating">3.9 ★</span>
                                        <ul>
                                            <li>7 Days Service Center Replacement/Repair</li>
                                            <li>GST invoice available</li>
                                        </ul>
                                        <a href="#">See other sellers</a>
                                    </div>
                                    
                                </div>

                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <div class="write_review_btn mt-4">
                                        <p><a href="https://prowebshop.online/user-login">Login</a> to write a review.</p>
                                    </div>

                                    <div class="mt-4">
                                        <h5>User Reviews</h5>
                                        <div class="review-block mt-3 border p-3 rounded">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="me-2 bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                                                    style="width: 35px; height: 35px;">
                                                    S
                                                </div>
                                                <div>
                                                    <div class="fw-bold">Sophia Jameson</div>
                                                    <div class="text-muted" style="font-size: 12px;">
                                                        08 Feb 2024
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="mb-1">Rating:
                                                    ⭐
                                                    ⭐
                                                    ⭐
                                                    ⭐
                                                </div>
                                                <div class="text-muted">Very professional and fast. They optimized my
                                                    startup and updated my printer drivers. My laptop feels faster and more
                                                    stable now.</div>
                                            </div>
                                        </div>
                                        <div class="review-block mt-3 border p-3 rounded">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="me-2 bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                                                    style="width: 35px; height: 35px;">
                                                    E
                                                </div>
                                                <div>
                                                    <div class="fw-bold">Ethan Brooks</div>
                                                    <div class="text-muted" style="font-size: 12px;">
                                                        05 Mar 2023
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="mb-1">Rating:
                                                    ⭐
                                                    ⭐
                                                    ⭐
                                                    ⭐
                                                    ⭐
                                                </div>
                                                <div class="text-muted">Great service. I called for help with my wireless
                                                    printer setup, and they walked me through everything over the phone. No
                                                    tech headaches anymore.</div>
                                            </div>
                                        </div>
                                        <div class="review-block mt-3 border p-3 rounded">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="me-2 bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                                                    style="width: 35px; height: 35px;">
                                                    L
                                                </div>
                                                <div>
                                                    <div class="fw-bold">Laura Bennett</div>
                                                    <div class="text-muted" style="font-size: 12px;">
                                                        09 Feb 2024
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="mb-1">Rating:
                                                    ⭐
                                                    ⭐
                                                    ⭐
                                                    ⭐
                                                    ⭐
                                                </div>
                                                <div class="text-muted">I was skeptical at first, but this was worth it.
                                                    They removed some nasty browser extensions and fixed my network printer
                                                    issue. Highly recommend.</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="contact_product">
                        <div class="card contact_card shadow-sm contact_stick">
                            <form class="needs-validation" novalidate action="{{ route('contact.usStore') }}" method="POST">
                                <h2><span class="linear_color">Contact With Us</span></h2>
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ old('name') }}" placeholder="Enter Your Name"
                                            required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" id="phone" placeholder="Phone Number" required pattern="\d{10}"
                                            maxlength="10" value="{{ old('phone') }}" title="Enter a valid 10-digit number">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3 ">
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="Email Address" required
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="services" class="form-label">Services <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select @error('services') is-invalid @enderror" id="services"
                                            name="services" required>
                                            <option value="" disabled {{ old('services') ? '' : 'selected' }}>Select a
                                                service</option>
                                            @foreach ($services_type as $type)
                                                <option value="{{ $type->type }}" {{ old('services') == $type->type ? 'selected' : '' }}>{{ $type->type }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('services')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn_theme w-100 btn_blog mt-3">SUBMIT FORM</button>
                            </form>
                        </div>
                    </div>



                </div>
    </section>
@endsection