@extends('Landings.layouts.app')
@section('title')
    Home
@endsection

@section('content')
    <main class="main-wrapper">
        <!-- Start Slider Area -->
        <div class="axil-main-slider-area main-slider-style-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="main-slider-content">
                            <h2 class="font-bold title">Step into the world <br> of limitless connectivity with CloverGH!
                            </h2>

                            <div class="shop-btn">
                                <a href="/alldatapackages" class="axil-btn btn-bg-primary"><i
                                        class="far fa-shopping-cart"></i> Get
                                    Started!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="slide-thumb-area">
                            <div class="main-thumb md:h-heroimageheight">
                                <img src="/assets/images/cloverImages/gloverHeroImage.png" alt="Happy Bundler">
                            </div>
                            <div class="banner-product">
                                <div class="product-details">
                                    <h4 class="title"><a href="single-product-8.html">Ladies Stylish Sunglasses</a>
                                    </h4>
                                    <div class="price">$15.22 - $15.22</div>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="rating-number">6,400</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Area -->
        <!-- Start Services Area  -->
        <div class="bg-color-white axil-section-gapcommon">
            <div class="container">
                <div class="slider-section-title section-title-border">
                    <div class="mb-0 section-title-wrapper">
                        <span class="title-highlighter highlighter-primary"> <i class="fas fa-concierge-bell"></i> Our
                            Services</span>
                        <h2 class="text-5xl font-bold title">Our Services</h2>
                    </div>
                </div>
                <div class="categrie-product-activation-4 slick-layout-wrapper--15 axil-slick-angle angle-top-slide">


                    <div class="container">
                        <div class="row row--20">
                            <div class="col-lg-4">
                                <div class="about-info-box">
                                    <div class="thumb">
                                        <img class="h-24" src="assets/images/cloverImages/bundleIcon.png" alt="Shape">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Data Packages</h6>
                                        <p>Seamless internet connectivity with affordable plans. Stay connected, work
                                            smarter, and explore online</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="about-info-box">
                                    <div class="thumb">
                                        <img src="assets/images/about/shape-02.png" alt="Shape">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Mobile Airtime</h6>
                                        <p>Never run out of talk time. Top-up and stay in touch effortlessly. Uninterrupted
                                            conversations await!.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="about-info-box">
                                    <div class="thumb">
                                        <img src="assets/images/about/shape-03.png" alt="Shape">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Other Service</h6>
                                        <p>Empower your sales teams with industry
                                            tailored solutions that support. Coming soon to your doorstep</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Service Area  -->
        <!-- Start Expolre Product Area  -->
        <div class="axil-product-area bg-color-white axil-section-gap pb--0">
            <div class="container">
                <div class="product-area pb--80">
                    <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> Our
                            Data Packages</span>
                        <h2 class="text-5xl font-bold title">Explore Our Data Packages</h2>
                    </div>
                    <div class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                        <div class="slick-single-layout">
                            <div class="row row--15">
                                @foreach ($packs as $package)
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                               @if ($package->name === "1GB AIRTELTIGO DATA BUNDEL")
                                               <a href="##">
                                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="1500"
                                                    src="/assets/images/cloverImages/tigo1GB.jpg" alt="Product Images">
                                            </a> 
                                               @elseif ($package->name === "2GB AIRTELTIGO DATA BUNDEL")
                                               <a href="##">
                                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="1500"
                                                    src="/assets/images/cloverImages/tigo2GB.jpg" alt="Product Images">
                                            </a> 
                                            @elseif ($package->name === "10GB AIRTELTIGO DATA BUNDEL")
                                            <a href="##">
                                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="1500"
                                                    src="/assets/images/cloverImages/tigo10GB.jpg" alt="Product Images">
                                            </a> 
                                            @elseif ($package->name === "20GB AIRTELTIGO DATA BUNDEL")
                                            <a href="##">
                                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="1500"
                                                    src="/assets/images/cloverImages/tigo20GB.jpg" alt="Product Images">
                                            </a> 
                                             @else
                                               @endif
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        {{--  <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>  --}}
                                                        <li class="select-option"> <a href="{{ route('addToCart', $package->id) }}">Add to Cart</a></li>
                                                        {{--  <li class="wishlist"><a  href="/wishlist"><i class="far fa-heart"></i></a></li>  --}}
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">{{ $package->name }}</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price"> ¢ {{ $package->price }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="text-center col-lg-12 mt--20 mt_sm--0">
                            <a href="/alldatapackages" class="axil-btn btn-bg-lighter btn-load-more">View All Packages</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Expolre Product Area  -->


        <!-- Start Why Choose Area  -->
        <div class="axil-why-choose-area axil-section-gap pb--50 pb_sm--30">
            <div class="container">
                <div class="section-title-wrapper section-title-center">
                    <span class="title-highlighter highlighter-secondary"><i class="fal fa-thumbs-up"></i>Why Us</span>
                    <h2 class="text-5xl font-bold title">Why You should Choose Us</h2>
                </div>
                <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 row--20">
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img class="md:ml-20 ml-[40%]" src="assets/images/icons/service6.png" alt="Service">
                            </div>
                            <h6 class="title">Fast &amp; Secure Delivery</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img class="md:ml-20 ml-[40%]" src="assets/images/icons/service7.png" alt="Service">
                            </div>
                            <h6 class="title">Wide Range of Options</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img class="md:ml-20 ml-[40%]" src="assets/images/icons/service8.png" alt="Service">
                            </div>
                            <h6 class="title">Convenience and Flexibility</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img class="md:ml-20 ml-[40%]" src="assets/images/icons/service9.png" alt="Service">
                            </div>
                            <h6 class="title">Unbeatable Bulk Pricing</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img class="md:ml-20 ml-[40%]" src="assets/images/icons/service10.png" alt="Service">
                            </div>
                            <h6 class="title">Reliable Customer Support</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Why Choose Area  -->

    </main>
    
    @include('sweetalert::alert')
@endsection
