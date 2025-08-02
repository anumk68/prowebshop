@extends('frontend.layout.app')
@section('title', $meta_title->meta_value ?? 'Default Website Title')
@section('description', $meta_description->meta_value ?? 'Default description')
@section('content')
<section class="banner_about_us py_8" style="background-image: url({{asset('public/frontend/img/pro_about_banners.png')}});">
    <div class="container">
        <div class="row">
            <div class="text_about_us">
                <h1>About Us</h1>
                <p>ProWebShop is dedicated to delivering innovative digital solutions that empower businesses to excel in the online marketplace.</p>
            </div>
        </div>
    </div>
</section>
<section class="who_we_are py_8">
    <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                    <div class="imagess">
                        <img src="{{asset('public/frontend/img/about_us_main_1.png')}}" alt="Team Working">
                        <img src="{{asset('public/frontend/img/about_us_main_2.avif')}}" alt="Developers at Work">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                    <div class="content">
                        <span>Who We Are</span>
                        <h2><span class="linear_color">About</span> ProWebShop</h2>
                        <p>At ProWebShop, we are more than just a digital agency—we are your growth partners in the ever-evolving online world. Founded to revolutionize digital experiences, we have become a trusted name for businesses looking to enhance their online presence, boost sales, and maximize brand visibility. We specialize in a wide range of services, including:</p>
                        <h4>Web Development</h4>
                        <p>– Custom website solutions using PHP Laravel, React-Java, Shopify, WordPress, Webflow, and Wix.</p>
                        <h4>E-commerce Solutions</h4>
                        <p>- Seamless and secure online stores tailored to drive conversions.</p>
                        <h4>SEO & Digital Marketing</h4>
                        <p>- Advanced SEO, PPC, SMO, and email marketing strategies for better engagement.</p>
                        <h4>Branding & Design</h4>
                        <p>- Crafting logos, UI/UX designs, and brand identities that leave a lasting impression.</p>
                        <h4>Content Development</h4>
                        <p>- High-quality, SEO-optimized content to attract and retain customers.
                            With a team of industry experts, creative minds, and tech specialists, we are committed to delivering results-driven solutions that help businesses thrive in today’s digital landscape.</p>
                           {{-- <div class="btn_wh_we_are">
                            <button class="btn_theme"><a href="#">Get Started</a></button>
                           </div> --}}
                    </div>
                </div>
            </div>
    </div>
</section>
<section class="innovation_main_cards">
    <div class="container">
        <div class="row justify-content-center">
               <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card" style="background-image: url({{asset('public/frontend/img/seller-bg.png')}});">
                    <h2 class="heading_color">Innovation</h2>
                    <p>We embrace cutting-edge technologies and creative solutions to develop unique digital experiences. Our commitment to innovation ensures that every project stays ahead of industry trends, delivering long-term success for our clients.</p>
                </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card" style="background-image: url({{asset('public/frontend/img/seller-bg.png')}});">
                    <h2>Expert Talent</h2>
                    <p>Our team comprises highly skilled professionals passionate about web development, digital marketing, and e-commerce solutions. With years of experience and expertise, we turn ideas into high-performing digital products.</p>
                </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card" style="background-image: url({{asset('public/frontend/img/seller-bg.png')}});">
                    <h2>Strategic Growth</h2>
                    <p>We align your business goals with strategic digital solutions to maximize impact. Using data-driven insights and industry best practices, we drive conversions, boost engagement, and ensure long-term growth for your brand.</p>
                </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card" style="background-image: url({{asset('public/frontend/img/seller-bg.png')}});">
                    <h2>Breakthrough Solutions</h2>
                    <p>We utilize the latest tools, advanced marketing techniques, and cutting-edge development frameworks to deliver outstanding results. By continuously innovating, we help businesses break through digital barriers and achieve new milestones.</p>
                </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card" style="background-image: url({{asset('public/frontend/img/seller-bg.png')}});">
                    <h2>Client-Centric Approach</h2>
                    <p>Your success is our priority. We work closely with our clients to understand their unique needs and challenges, offering personalized solutions that foster long-term partnerships. At ProWebShop, we believe in delivering value beyond expectations.</p>
                </div>
               </div>
        </div>
    </div>
</section>
<section class="about_testimonial_main py_8">
    <div class="container">
        <div class="testimonial-section">
            <h2 class="testimonial-title linear_testimonial">What Our Clients Say</h2>
            <div class="owl-carousel about_testimonial owl-theme">
                <div class="item">
                    <div class="stars">★★★★★</div>
                    <p class="testimonial-content">"Pro Web Shop created an impressive WordPress site, managing design and SEO flawlessly. Great communication and outstanding results—highly recommended!"</p>
                    <div class="flex_testimonial_img">
                        <div class="img_client">
                            <img src="{{asset('public/frontend/img/client11.png')}}" alt="">
                        </div>
                        <div class="txt_name">
                            <p class="testimonial-author">— Emma J.</p>
                    <p class="testimonial-role">United Kingdom</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="stars">★★★★★</div>
                    <p class="testimonial-content"> "They managed our Google Ads campaigns with precision. We saw a 3x ROI in just two months. Excellent PPC strategy and real-time reporting. Very happy with their work!"
</p>
                    <div class="flex_testimonial_img">
                        <div class="img_client">
                            <img src="{{asset('public/frontend/img/client2.png')}}" alt="">
                        </div>
                        <div class="txt_name">
                            <p class="testimonial-author">— Carlos M.</p>
                    <p class="testimonial-role">Spain</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="stars">★★★★★</div>
                    <p class="testimonial-content"> "Their custom web development was excellent—scalable, fast, and responsive. The team aligned with our goals and delivered a sleek, modern site."</p>
                    <div class="flex_testimonial_img">
                        <div class="img_client">
                            <img src="{{asset('public/frontend/img/client3.png')}}" alt="">
                        </div>
                        <div class="txt_name">
                            <p class="testimonial-author">— Olivia R.</p>
                    <p class="testimonial-role">Australia</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="stars">★★★★★</div>
                    <p class="testimonial-content"> "Pro Web Shop’s SEO team is incredible. They helped us rank on Google for multiple keywords in under 3 months. Great value, very professional, and results-driven!"</p>
                    <div class="flex_testimonial_img">
                        <div class="img_client">
                            <img src="{{asset('public/frontend/img/client1.png')}}" alt="">
                        </div>
                        <div class="txt_name">
                            <p class="testimonial-author">— Noah B.</p>
                    <p class="testimonial-role">  Canada</p>
                        </div>
                    </div>
                </div>
                   <div class="item">
                    <div class="stars">★★★★★</div>
                    <p class="testimonial-content"> "We chose their Shopify development package, and it was worth every cent. Our online store looks great, functions flawlessly, and is already getting traffic. A+ service!"</p>
                    <div class="flex_testimonial_img">
                        <div class="img_client">
                            <img src="{{asset('public/frontend/img/client10.png')}}" alt="">
                        </div>
                        <div class="txt_name">
                            <p class="testimonial-author">— Julia S.</p>
                    <p class="testimonial-role">Germany</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $(".about_testimonial").owlCarousel({
            loop: true,
            margin: 15,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive:{
                0:{ items:1 },
                992:{ items:2 },
                1000:{ items:2 },
                1400:{items:3}
            }
        });
    });
</script>
@endsection
