<footer class="footer" style="background-image: url({{ asset('public/frontend/img/footer_pro.png') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="footer-section about">
                    <a href="{{ route('/') }}"><img src="{{ asset('public/frontend/img/footer_logo_pro.png') }}"
                            alt="ProWebShop Logo" class="logo"></a>
                    <p>Boost your brand with Pro Web Shop – expert digital marketing agency providing affordable SEO and
                        web services packages tailored to grow your business.
                    </p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="footer-section left_space links web_padding">
                    <h3>Web Service</h3>
                    <ul>
                        <li><a href="{{ route('php-laravel-website') }}"><i class="fa fa-chevron-right"></i> &nbsp; PHP
                                Laravel
                                Website</a></li>
                        <li><a href="{{ route('react-java-website') }}"><i class="fa fa-chevron-right"></i> &nbsp; React
                                – Java
                                Web</a></li>
                        <li><a href="{{ route('shopify-development') }}"><i class="fa fa-chevron-right"></i> &nbsp;
                                Shopify
                                Website</a></li>
                        <li><a href="{{ route('webflow-development') }}"><i class="fa fa-chevron-right"></i> &nbsp;
                                Webflow
                                Website</a></li>
                        <li><a href="{{ route('wix-website-development') }}"><i class="fa fa-chevron-right"></i> &nbsp;
                                Wix
                                Website</a></li>
                        <li><a href="{{ route('wordpress-website-development') }}"><i class="fa fa-chevron-right"></i>
                                &nbsp;
                                WordPress Website</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="footer-section links">
                    <h3>Digital Marketing</h3>
                    <ul>
                        <li><a href="{{ route('search-engine-optimization') }}"><i class="fa fa-chevron-right"></i>
                                &nbsp; SEO
                                Services</a></li>
                        <li><a href="{{ route('ppc-services') }}"><i class="fa fa-chevron-right"></i> &nbsp; PPC
                                Services</a>
                        </li>
                        <li><a href="{{ route('smo-services') }}"><i class="fa fa-chevron-right"></i> &nbsp; SMO
                                Services</a>
                        </li>
                        <li><a href="{{ route('email-marketing-service') }}"><i class="fa fa-chevron-right"></i> &nbsp;
                                Email
                                Marketing & Bulk Sms</a>
                        </li>
                        <li><a href="{{ route('blogs') }}"><i class="fa fa-chevron-right"></i> &nbsp; Blogs
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="footer-section contact">
                    <h3>Contact Us</h3>
                    <ul>
                        <li>
                            <a href="tel:+9123456798" class="text-decoration-none  ">
                                <i class="fas fa-phone-alt"></i> +91 23456798
                            </a>
                        </li>
                        <li>
                            <a href="mailto:info@prowebshop.online" class="text-decoration-none ">
                                <i class="fas fa-envelope"></i> info@prowebshop.online
                            </a>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i> Address
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="footer_l">
                        <p>© 2025, All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="footer_r">
                        <a href="{{ route('privacy.policy') }}">Privacy&nbsp;Policy</a>
                        <a href="{{ route('refund.policy') }}">Refund&nbsp;Policy</a>
                        <a href="{{ route('termsand.condition') }}">Terms&nbsp;and&nbsp;Condition</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="scroll-top" id="scrollTopBtn"><i class="fas fa-chevron-up"></i></button>
</footer>