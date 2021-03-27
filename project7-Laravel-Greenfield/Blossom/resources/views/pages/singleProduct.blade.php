@extends('layouts.shopTemp')

@section('shop_content')
<!-- Single Product Main Area Start -->
<div class="single-product-main-area">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 col-custom">
                <div class="product-details-img">
                    <div class="single-product-img swiper-container gallery-top popup-gallery">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a class="w-100" href="assets/images/product/large-size/1.jpg">
                                    <img class="w-100" src="/images/{{$product->product_image}}" alt="Product">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a class="w-100" href="assets/images/product/large-size/2.jpg">
                                    <img class="w-100" src="assets/images/product/large-size/2.jpg" alt="Product">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a class="w-100" href="assets/images/product/large-size/3.jpg">
                                    <img class="w-100" src="assets/images/product/large-size/3.jpg" alt="Product">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a class="w-100" href="assets/images/product/large-size/4.jpg">
                                    <img class="w-100" src="assets/images/product/large-size/4.jpg" alt="Product">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a class="w-100" href="assets/images/product/large-size/5.jpg">
                                    <img class="w-100" src="assets/images/product/large-size/5.jpg" alt="Product">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a class="w-100" href="assets/images/product/large-size/6.jpg">
                                    <img class="w-100" src="assets/images/product/large-size/6.jpg" alt="Product">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="single-product-thumb swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">

                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next swiper-button-white"><i class="lnr lnr-arrow-right"></i></div>
                        <div class="swiper-button-prev swiper-button-white"><i class="lnr lnr-arrow-left"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-custom">
                <div class="product-summery position-relative">
                    <div class="product-head mb-3">

                        <h2 class="product-title mb-2">{{$product->product_name}}</h2>
                        <h4 class="regular-price"><?php print_r($desc[0]['category_name'])  ?></h4>
                    </div>
                    <div class="price-box mb-2">
                        <span class="regular-price">JOD{{$product->product_price *0.8}}</span>
                        <span class="old-price"><del>JOD{{$product->product_price }}</del></span>
                    </div>

                    <div class="sku mb-3">
                        <span>SKU: {{$product->pro_id}}</span>
                    </div>
                    <p class="desc-content mb-5">{{$product->product_desc}}</p>
                    <div class="quantity-with_btn mb-5">

                        <div class="add-to_cart">
                            <a class="btn product-cart button-icon flosun-button dark-btn" href="{{route('cart.show',$product->pro_id)}}">Add to cart</a>
                            <a class="btn flosun-button secondary-btn secondary-border rounded-0" href="{{route('shop.index')}}">Continue shopping</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="row mt-no-text">
            <div class="col-lg-12 col-custom">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#connect-1" role="tab" aria-selected="true">Description</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-uppercase" id="contact-tab" data-toggle="tab" href="#connect-3" role="tab" aria-selected="false">Shipping Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" id="review-tab" data-toggle="tab" href="#connect-4" role="tab" aria-selected="false">Details </a>
                    </li>
                </ul>
                <div class="tab-content mb-text" id="myTabContent">
                    <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
                        <div class="desc-content">
                            <p class="mb-3"> {{$product->product_desc}} </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- Start Single Content -->
                        <div class="product_tab_content  border p-3">
                            <div class="review_address_inner">
                                <!-- Start Single Review -->
                                <div class="pro_review mb-5">
                                    <div class="review_thumb">
                                        <img alt="review images" src="assets/images/review/1.jpg">
                                    </div>
                                    <div class="review_details">
                                        <div class="review_info mb-2">
                                            <div class="product-rating mb-2">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <h5>Admin - <span> December 19, 2020</span></h5>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in viverra ex, vitae vestibulum arcu. Duis sollicitudin metus sed lorem commodo, eu dapibus libero interdum. Morbi convallis viverra erat, et aliquet orci congue vel. Integer in odio enim. Pellentesque in dignissim leo. Vivamus varius ex sit amet quam tincidunt iaculis.</p>
                                    </div>
                                </div>
                                <!-- End Single Review -->
                            </div>
                            <!-- Start RAting Area -->
                            <div class="rating_wrap">
                                <h5 class="rating-title-1 font-weight-bold mb-2">Add a review </h5>
                                <p class="mb-2">Your email address will not be published. Required fields are marked *</p>
                                <h6 class="rating-title-2 mb-2">Your Rating</h6>
                                <div class="rating_list mb-4">
                                    <div class="review_info">
                                        <div class="product-rating mb-3">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End RAting Area -->
                            <div class="comments-area comments-reply-area">
                                <div class="row">
                                    <div class="col-lg-12 col-custom">
                                        <form action="#" class="comment-form-area">
                                            <div class="row comment-input">
                                                <div class="col-md-6 col-custom comment-form-author mb-3">
                                                    <label>Name <span class="required">*</span></label>
                                                    <input type="text" required="required" name="Name">
                                                </div>
                                                <div class="col-md-6 col-custom comment-form-emai mb-3">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input type="text" required="required" name="email">
                                                </div>
                                            </div>
                                            <div class="comment-form-comment mb-3">
                                                <label>Comment</label>
                                                <textarea class="comment-notes" required="required"></textarea>
                                            </div>
                                            <div class="comment-form-submit">
                                                <button class="btn flosun-button secondary-btn rounded-0">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Content -->
                    </div>
                    <div class="tab-pane fade" id="connect-3" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="shipping-policy">
                            <h4 class="title-3 mb-4">Shipping policy for our store</h4>
                            <p class="desc-content mb-2">Delivery with Services
                            </p>
                            <ul class="policy-list mb-2">
                                <li>1-2 business days (Typically by end of day)</li>
                                <li><a href="#">30 days money back guaranty</a></li>
                                <li>24/7 live support</li>

                                <li>All sellers participating in the Delivery with Services program are required to support scheduled return pickups or exchanges.</li>
                            </ul>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="connect-4" role="tabpanel" aria-labelledby="review-tab">
                        <div class="size-tab table-responsive-lg">

                            <table class="table border">
                                <tbody>

                                    <tr>
                                        <td class="cun-name"><span>Number of Flowers</span></td>
                                        <td>10</td>
                                        <td>20</td>
                                        <td>30</td>

                                    </tr>
                                    <tr>
                                        <td class="cun-name"><span>Flowers types</span></td>
                                        <td>Tulipe</td>
                                        <td>Rose</td>
                                        <td>Fawania</td>

                                    </tr>
                                    <tr>
                                        <td class="cun-name"><span>Flowers Colors</span></td>
                                        <td>Red</td>
                                        <td>Yellow</td>
                                        <td>Pink</td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single Product Main Area End -->
<!--Product Area Start-->
<div class="product-area mt-text-3">
    <div class="container custom-area-2 overflow-hidden">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12 col-custom">
                <div class="section-title text-center mb-30">
                    <span class="section-title-1">The Most Trendy</span>
                    <h3 class="section-title-3">More Products</h3>
                </div>
            </div>
            <!--Section Title End-->
        </div>


        <div class="row product-row">
            <div class="col-12 col-5">

                <div class="product-slider swiper-container anime-element-multi">
                    <div class="swiper-wrapper">

                        @foreach ($products as $product =>$value)
                        <div class="single-item swiper-slide">
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image" style="height:20rem">
                                    <a class="d-block" href="{{ route('product.show', $value->pro_id)}}">
                                        <img src="/images/{{$value->product_image}}" class="product-image-1 w-100" style="height:20rem">
                                    </a>

                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="{{ route('product.show', $value->pro_id)}}">Flowers daisy pink stick</a></h4>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">JOD{{$value->product_price * 0.8}}</span>
                                        <span class="old-price"><del>JOD{{$value->product_price}}</del></span>
                                    </div>
                                    <a href="{{route('cart.show',$value->pro_id)}}" class="btn product-cart">Add to Cart</a>
                                </div>
                            </div>
                            <!--Single Product End-->
                        </div>
                        <!-- Slider pagination -->
                        @endforeach

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection