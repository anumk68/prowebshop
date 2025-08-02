@extends('frontend.layout.app')
@section('content')
<section class="banner_about_us py_8" style="background-image: url({{asset('frontend/img/pro_about_banners.png')}});">
    <div class="container">
        <div class="row">
            <div class="text_about_us">
                <h2>Product</h2>
            </div>
        </div>
    </div>
</section>
<section class="single_product_one py_8">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="product_img">
                    <img src="{{ asset('frontend/img/card_image.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-container">
                    <h2>Packages</h2>
                    <h3>What’s Included in the WordPress Startup Package?</h3>
                    <p class="special-price">Special Price</p>
                    <p class="price">₹279 <span class="old-price">₹1,599</span> <span class="discount">82% off</span></p>
                    <p class="rating">⭐ 3.9 | 6,087 ratings and 204 reviews</p>
                    <div class="size-section">
                        <p>Packages</p>
                        <div class="size-options">
                            <button>PHP</button>
                            <button>Laravel</button>
                            <button>React</button>
                        </div>
                    </div>
                    <div class="size-section">
                        <p>Packages</p>
                        <div class="size-options">
                            <button>Startup</button>
                            <button>Basic</button>
                            <button>Corporate</button>
                        </div>
                    </div>
                    <div class="offers">
                        <p>  <img src="{{ asset('frontend/img/icon_product_mini.webp')}}" alt=""><b> Offer</b> 5% Unlimited Cashback on Flipkart Axis Bank Credit Card</p>
                        <p><img src="{{ asset('frontend/img/icon_product_mini.webp')}}" alt=""><b> Offer</b> 10% off up to ₹1,250 on HDFC Bank Credit Card Transactions</p>
                        <p><img src="{{ asset('frontend/img/icon_product_mini.webp')}}" alt=""><b> Offer</b> 10% off up to ₹1,500 on HDFC Bank Credit Card EMI Transactions</p>
                        <p><img src="{{ asset('frontend/img/icon_product_mini.webp')}}" alt=""><b> Offer</b> Buy 2 or more items save ₹20</p>
                    </div>
                    <div class="seller_product_mini">
                        <div class="highlight_ram">
                            <div class="highlight_column">
                                <h3>Highlights</h3>
                                <ul>
                                    <li>8 GB RAM | 256 GB ROM</li>
                                    <li>17.2 cm (6.77 inch) Full HD+ Display</li>
                                    <li>50MP (Main) + 50MP (3X Periscope) + 8MP (Ultra-Wide) | 50MP Front Camera</li>
                                    <li>5000 mAh Battery</li>
                                    <li>7s Gen3 Processor</li>
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
                    <div class="delivery">
                        <div class="product-description">
                            <h2>Product Description</h2>
                          <div class="row align-items-center mb-4">
                            <div class="col-md-8">
                                <div class="feature">
                                    <div class="text">
                                        <h3>Package</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum voluptates minus distinctio cum repellendus eum odio dolorum fugit nulla ad ipsam labore provident et, modi reiciendis, earum impedit neque culpa!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="image">
                                    <img src="{{ asset('frontend/img/card_image.jpg')}}" alt="Pro Camera System">
                                </div>
                            </div>
                        </div>
                         <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="image">
                                    <img src="{{ asset('frontend/img/card_image.jpg')}}" alt="Snapdragon 7s Gen 3 5G">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="feature">
                                    <div class="text">
                                        <h3>Package</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic eum magni illo molestiae maxime provident quasi, libero deserunt quos iusto molestias impedit sequi, distinctio aperiam at tenetur maiores expedita repellat?</p>
                                    </div>
                                </div>
                            </div>
                         </div>
                        </div>
                    </div>
                </div>
                <div class="reviews-container">
                    <div class="header">
                        <h2>Ratings & Reviews</h2>
                        <span class="rating">3.9 ★</span>
                        <button class="btn_theme"><a href="#">Add to cart</a></button>
                    </div>
                    <div class="reviews">
                        <div class="review">
                            <span class="stars">4 ★</span>
                            <p>Awesome 👍</p>
                            <span class="user">Sourav Patra • 5 months ago</span>
                            <span class="location">Certified Buyer, Rishra</span>
                            <div class="likes">👍 160 | 👎 60</div>
                            <section class="single_product_slider">
                                <div class="containers">
                                    <div class="slider-container">
                                        <div class="owl-carousel single_product_gallery owl-theme">
                                            <div class="item">
                                                <img src="{{asset('img/card_image.jpg')}}" alt="Product 1">
                                            </div>
                                            <div class="item">
                                                <img src="{{ asset('frontend/img/card_image.jpg')}}" alt="Product 1">
                                            </div>
                                            <div class="item">
                                                <img src="{{ asset('frontend/img/card_image.jpg')}}" alt="Product 1">
                                            </div>
                                            <div class="item">
                                                <img src="{{ asset('frontend/img/card_image.jpg')}}" alt="Product 1">
                                            </div>
                                        </div>
                                </div>
                             </section>
                        </div>
                    </div>
                    <a href="#" class="all-reviews">All 204 reviews →</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="proweb_counter py_8">
    <div class="container">
        <div class="heading_counter">
            <h2>Happy Clients</h2>
        </div>
        <div id="counter">
            <div class="item">
               <h1 class="count" data-number="50" ></h1>
               <h3 class="text">Reward</h3>
            </div>
            <div class="item">
               <h1 class="count" data-number="15" ></h1>
               <h3 class="text">year+ Eexperience</h3>
            </div>
            <div class="item">
               <h1 class="count" data-number="2040" ></h1>
               <h3 class="text">project completed</h3>
            </div>
            <div class="item">
               <h1 class="count" data-number="1018" ></h1>
               <h3 class="text">happy clients</h3>
            </div>
          </div>
    </div>
</section>
@endsection
