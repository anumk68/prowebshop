@extends('frontend.layout.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <section class="banner_about_us py_8" style="background-image: url({{ asset('public/frontend/img/about_banner.png') }});">
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
                        <h3>{{ $package_details->title }}</h3>
                        <p class="special-price">Special Price</p>
                        @php

                            preg_match_all('/\d+/', $package_details->amount, $matches);
                            $amounts = $matches[0];

                            $firstAmount = isset($amounts[0]) ? (int) $amounts[0] : 0;
                            $secondAmount = isset($amounts[1]) ? (int) $amounts[1] : 0;
                            $discountPercent = 0;
                            if ($secondAmount > 0 && $secondAmount > $firstAmount) {
                                $discountPercent = round((($secondAmount - $firstAmount) / $secondAmount) * 100);
                            }
                        @endphp
                        <p class="price">${{ $firstAmount }} <span class="old-price">${{ $secondAmount }}</span> <span
                                class="discount">{{ $discountPercent }}% off</span>
                        </p>
                        <p class="rating">⭐ {{$averageRating}} | {{$total_rating}} ratings and {{$total_review}} reviews</p>


                        <div class="size-section">
                            <p>Technology Stack</p>
                            <div class="size-options">
                                {{-- @foreach ($package_technology as $package_tech)

                                @endforeach --}}
                                <button>{{$package_details->typess->type}}</button>

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
                            @foreach ($offers as $offer)
                            <p><img src="{{ asset('frontend/img/icon_product_mini.webp') }}" alt=""><b> Offer</b> {{$offer->discount}}%
                               {{$offer->description}}</p>
                            @endforeach
 
                        </div>
                        <div id="package-{{ $package_details->id }}" class="package-wrapper">
                            <form method="POST" action="{{ route('add.to.cart') }}" class="d-flex align-items-center">
                                @csrf
                                <input type="hidden" name="package_id" value="{{ $package_details->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn_theme mt-3 ">
                                    Add To Cart
                                </button>
                            </form>
                        </div>

                        <div>
                            <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active heading_description" id="desc-tab" data-bs-toggle="tab"
                                        data-bs-target="#desc" type="button" role="tab"
                                        aria-selected="true">Description</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link heading_description" id="review-tab" data-bs-toggle="tab"
                                        data-bs-target="#review" type="button" role="tab" aria-selected="false"
                                        tabindex="-1">Review</button>
                                </li>
                            </ul>
                            <div class="tab-content p-3 border border-top-0 mb-4 decrip_content " id="myTabContent">
                                <div class="tab-pane fade active show" id="desc" role="tabpanel"
                                    aria-labelledby="desc-tab">
                                    <div class="seller_product_mini">
                                        <div class="highlight_ram">
                                            <div class="highlight_column">
                                                {{-- <h3>Highlights</h3> --}}
                                                {!! $package_details->description !!}

                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    @if (Auth::guard('userWeb')->check())
                                        <button type="button" class="btn_theme mt-3 btn_blog" data-bs-toggle="modal"
                                            data-bs-target="#reviewModal">
                                            Write a Review
                                        </button>

                                        <div class="modal fade" id="reviewModal" tabindex="-1"
                                            aria-labelledby="reviewModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">

                                                        {{-- CSRF Meta --}}
                                                        <meta name="csrf-token" content="{{ csrf_token() }}">

                                                        <form action="{{ route('review.store') }}" method="POST"
                                                            id="reviewForm">
                                                            @csrf

                                                            {{-- Hidden Inputs --}}
                                                            <input type="hidden" name="package_id" id="package-id"
                                                                value="{{ $package_details->id }}">
                                                            <input type="hidden" name="rating" id="rating"
                                                                value="0">

                                                            {{-- Star Rating --}}
                                                            <div id="starRating" class="star-rating mb-2">
                                                                <span class="star" data-value="1">★</span>
                                                                <span class="star" data-value="2">★</span>
                                                                <span class="star" data-value="3">★</span>
                                                                <span class="star" data-value="4">★</span>
                                                                <span class="star" data-value="5">★</span>
                                                            </div>
                                                            <div>Current Rating: <span class="rating-output"
                                                                    id="currentRating">0</span></div>
                                                            <span class="text-danger" id="rating_error"></span>

                                                            {{-- Review Textarea --}}
                                                            <textarea class="form-control mt-3" id="review" name="review" rows="4"
                                                                placeholder="Write your review..."></textarea>
                                                            <span class="text-danger" id="review_error"></span>

                                                            {{-- Submit Button --}}
                                                            <button type="submit" class="btn_theme mt-3 btn_blog"
                                                                st>Submit</button>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="write_review_btn mt-4">
                                            <p><a href="{{ route('user.login.get') }}">Login</a> to write a review.</p>
                                        </div>
                                    @endif

                                    <div class="mt-4">
                                        <h5>User Reviews</h5>
                                        @foreach ($reviews as $review)
                                            <div class="review-block mt-3 border p-3 rounded">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="me-2 bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                                                        style="width: 35px; height: 35px;">
                                                        {{ strtoupper(substr($review->user->name, 0, 1)) }}

                                                    </div>
                                                    <div>
                                                        <div class="fw-bold">{{ $review->user->name }}</div>
                                                        <div class="text-muted" style="font-size: 12px;">
                                                            {{ $review->created_at }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="mb-1"> Rating:
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $review->rating)
                                                                <span style="color: gold;">★</span>
                                                            @else
                                                                <span style="color: lightgray;">★</span>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <div class="text-muted">{{ $review->review }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="contact_product">
                        <div class="card contact_card shadow-sm contact_stick">
                            <form class="needs-validation" novalidate action="{{ route('contact.usStore') }}"
                                method="POST">
                                <h2><span class="linear_color">Contact With Us</span></h2>
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ old('name') }}"
                                            placeholder="Enter Your Name" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" id="phone" placeholder="Phone Number" required
                                            pattern="\d{10}" maxlength="10" value="{{ old('phone') }}"
                                            title="Enter a valid 10-digit number">
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
                                            <option value="" disabled {{ old('services') ? '' : 'selected' }}>Select
                                                a
                                                service</option>
                                            @foreach ($services_type as $type)
                                                <option value="{{ $type->type }}"
                                                    {{ old('services') == $type->type ? 'selected' : '' }}>
                                                    {{ $type->type }}
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



    <section class="pricing-section py_8 pt-0">
        <div class="container">
            <div class="pricing_heading">
                <h2><span class="linear_color">Recent </span>Packages</h2>
            </div>
            <div class="row justify-content-center">
                @foreach ($recent_package as $package)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="pricing-card">
                              <a href="{{route('productdetail', $package->id)}}">
                            <img src="{{ asset('public/storage/' . $package->image) }}" alt="digital marketing agency">
                            <h3>{{ $package->title }}</h3>
                            @php
                                $amounts = explode(' ', $package->amount);
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
                            <p style="margin-left: 12px;">{{ $package->ideal }}</p>
                            <ul>
                                @foreach (preg_split('/\r\n|\r|\n/', $package->description) as $feature)
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
                                        ->where('package_id', $package->id)
                                        ->first();
                                } else {
                                    $sessionCart = session('cart', []);
                                    foreach ($sessionCart as $item) {
                                        if ($item['package_id'] == $package->id) {
                                            $inSession = true;
                                            break;
                                        }
                                    }
                                }
                            @endphp
                            <div id="package-{{ $package->id }}" class="package-wrapper">
                                <form method="POST" action="{{ route('add.to.cart') }}"
                                    class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $package->id }}">
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

    {{-- JavaScript --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('.star').forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.dataset.value;
                    document.getElementById('rating').value = rating;
                    document.getElementById('currentRating').textContent = rating;

                    document.querySelectorAll('.star').forEach(s => {
                        s.style.color = s.dataset.value <= rating ? 'gold' : 'gray';
                    });

                    document.getElementById('rating_error').textContent = '';
                });
            });

            document.getElementById('reviewForm').addEventListener('submit', function(e) {
                e.preventDefault();

                // Clear previous errors
                document.getElementById('rating_error').textContent = '';
                document.getElementById('review_error').textContent = '';

                const form = this;
                const formData = new FormData(form);

                fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        },

                        body: formData
                    })
                    .then(response => {
                        if (response.status === 422) {
                            return response.json().then(data => Promise.reject(data.errors));
                        } else if (response.status === 401) {
                            alert("Please log in first to submit a review.");
                            return;
                        }
                        return response.json();
                    })
                    .then(data => {
                        alert(data.message || 'Review submitted successfully!');
                        location.reload();
                        document.getElementById('currentRating').textContent = '0';
                        document.querySelectorAll('.star').forEach(s => s.style.color = 'gray');
                    })
                    .catch(errors => {
                        if (errors.rating) {
                            document.getElementById('rating_error').textContent = errors.rating[0];
                        }
                        if (errors.review) {
                            document.getElementById('review_error').textContent = errors.review[0];
                        }
                    });
            });
        });
    </script>
@endsection
