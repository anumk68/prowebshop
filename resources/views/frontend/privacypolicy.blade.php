@extends('frontend.layout.app')
@section('content')
    <section class="banner_about_us py_8"
        style="background-image: url({{asset('public/frontend/img/privacy_policy.webp')}});">
        <div class="container">
            <div class="row">
                <div class="text_about_us">
                    <h1>Privacy Policy</h1>
                    <p>At ProWebShop.online, we prioritize the privacy of our visitors and customers. This Privacy Policy
                        explains how we collect, use, protect, and disclose your personal information when you use our
                        website and services.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="privacy_policy py_8">
        <div class="container">
            <div class="content">
                <div>
                    <h4>Information We Collect</h4>
                    <p>

                    <ul>
                        <li>
                            Personal information (such as name, email, address, phone number) provided during account
                            creation or when placing an order.
                        </li>
                        <li>
                            Payment details for processing transactions.
                        </li>
                        <li>Technical and usage data, including IP addresses, browser type, and device identifiers,
                            collected through cookies and analytics tools.
                        </li>
                        <li>Any information you choose to share with us through forms or direct correspondence.
                        </li>
                    </ul>




                    </p>
                </div>
                <div>
                    <h4>How We Use Your Information</h4>
                    <p>
                    <ul>
                        <li>
                            To process orders and provide requested services.
                        </li>
                        <li>
                            To communicate updates, offers, or responses to inquiries.
                        </li>
                        <li>
                            To improve website functionality and personalize your experience.
                        </li>
                        <li>
                            To detect and prevent fraud or abuse.
                        </li>
                    </ul>
                    </p>
                </div>
                <div>
                    <h4>Cookies</h4>
                    <p>We use cookies and similar technologies to understand user preferences, monitor usage, and enhance
                        your shopping experience. You may adjust your browser settings to reject cookies; however, this may
                        affect the functionality of our site.
                    </p>
                </div>
                <div>
                    <h4>Third-Party Sharing</h4>
                    <p>We do not sell your personal information. We may share information with third-party service providers
                        (for payment processing, shipping, analytics) only as necessary to fulfill your orders and operate
                        our business.</p>
                </div>
                <div>
                    <h4>Your Rights</h4>
                    <p>You can access, update, or request deletion of your personal data by contacting us at <a
                            href="mailto:contact@prowebshop.online" class="privacy_mail">info@prowebshop.online</a>. We
                        commit to safeguarding your personal details and complying with relevant privacy regulations.
                    </p>
                </div>
<div>
    <h4>Updates</h4>
    <p>We may modify this Privacy Policy from time to time. Any changes will be posted on this page with an updated effective date.</p>
</div>


            </div>
        </div>

    </section>
@endsection