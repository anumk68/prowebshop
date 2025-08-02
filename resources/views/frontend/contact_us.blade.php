@extends('frontend.layout.app')
@section('title', $meta_title->meta_value ?? 'Default Website Title')
@section('description', $meta_description->meta_value ?? 'Default description')
@section('content')
    {{-- Banner --}}
    <section class="banner_about_us py_8"
        style="background-image: url({{ asset('public/frontend/img/pro_about_banners.png') }});">
        <div class="container">
            <div class="row">
                <div class="text_about_us">
                    <h1>Contact Us</h1>
                    {{-- <p>ProWebShop is dedicated to delivering innovative digital solutions that empower businesses to
                        excel in the online marketplace.</p> --}}
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <h2 class="fw-semibold text-dark fs-4">Contact Us for Pro Web Shop</h2>
                    <p class="text-dark">At <strong>Pro Web Shop</strong>, we’re here to provide you with reliable website
                        and digital support solutions.
                        <span class="d-block">Whether you need web design, SEO, e-commerce setup, or general assistance, our
                            team is ready to help.</span>
                    </p>
                    <div class="d-flex align-items-center gap-3 mt-3">
                        <div class="bg-light rounded-circle p-2">
                            <i class="fas fa-envelope fs-5" style="color:#6d39f2"></i>
                        </div>
                        <a href="mailto:contact@prowebshop.online" class="text-dark text-decoration-none">
                            info@prowebshop.online
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-3 mt-3">
                        <div class="bg-light rounded-circle p-2">
                            <i class="fas fa-phone-alt fs-5" style="color:#6d39f2"></i>
                        </div>
                        <a href="tel:+18887684709" class="text-dark text-decoration-none">
                            +91 23456798
                        </a>
                    </div>
                    <div class="d-flex align-items-start gap-3 mt-3">
                        <div class="bg-light rounded-circle p-2">
                            <i class="fas fa-map-marker-alt fs-5"style="color:#6d39f2"></i>
                        </div>
                        <p class="mb-0 text-dark">C-177A, Uttam Towers, Phase 8B, Industrial Area, Sector 74, <br>Sahibzada
                            Ajit Singh Nagar, Punjab 160074</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card contact_card p-4 shadow-sm">
                        <form class="needs-validation" novalidate action="{{ route('contact.usStore') }}" method="POST">
                                <h2><span class="linear_color">Contact With Us</span></h2>
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                        id="name" value="{{ old('name') }}" placeholder="Enter Your Name" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number <span
                                            class="text-danger">*</span></label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        id="phone" placeholder="Phone Number" required pattern="\d{10}" maxlength="10"
                                        value="{{ old('phone') }}" title="Enter a valid 10-digit number">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
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
                            <button type="submit" class="btn_theme w-100">SUBMIT FORM</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-4">
        <div class="container-fluid px-0">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3154.1556407447424!2d-122.24685562440837!3d37.76294861284156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f86bdc2339109%3A0xd7bc36438b7582b8!2s1311%20Park%20St%2C%20Alameda%2C%20CA%2094501%2C%20USA!5e0!3m2!1sen!2sin!4v1750659220857!5m2!1sen!2sin"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <script>
        (function () {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
@endsection