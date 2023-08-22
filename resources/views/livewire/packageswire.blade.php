<div class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
    <div class="slick-single-layout">
        <div class="row row--15">
            @foreach ($packages as $package)
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
                                    <li class="quickview"><a href="#" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    <li class="select-option"> <a wire:click = "addToCart()">Add to Cart</a></li>
                                    <li class="wishlist"><a  href="/wishlist"><i class="far fa-heart"></i></a></li>
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
