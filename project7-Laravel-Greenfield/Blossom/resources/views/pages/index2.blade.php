@extends('layouts.temp') @section('slider')

<!-- Slider/Intro Section Start -->
<div class="intro11-slider-wrap section">
    <div class="intro11-slider swiper-container">
        <div class="swiper-wrapper">
            <div class="intro11-section swiper-slide slide-1 slide-bg-1 bg-position">
                <!-- Intro Content Start -->
                <div class="intro11-content text-left">
                    <h2 class="title">2021 Flower Trend</h2>
                    <h3 class="desc-content">
                        someone special on mind? near or far, let your loved
                        ones know that you'r thinking of them with fresh
                        flowers!
                    </h3>
                    <a href="shop" class="btn flosun-button secondary-btn theme-color rounded-0">Shop Now</a>
                </div>
                <!-- Intro Content End -->
            </div>
            <div class="intro11-section swiper-slide slide-2 slide-bg-1 bg-position">
                <!-- Intro Content Start -->
                <div class="intro11-content text-left">
                    <h2 class="title">
                        Flowers <br />
                        Birthday Gift
                    </h2>
                    <p class="desc-content">
                        someone special on mind? near or far, let your loved
                        ones know that you'r thinking of them with fresh
                        flowers!
                    </p>
                    <a href="shop" class="btn flosun-button secondary-btn rounded-0">Shop Now</a>
                </div>
                <!-- Intro Content End -->
            </div>
        </div>

        <!-- Slider Navigation -->
        <div class="home1-slider-prev swiper-button-prev main-slider-nav">
            <i class="lnr lnr-arrow-left"></i>
        </div>
        <div class="home1-slider-next swiper-button-next main-slider-nav">
            <i class="lnr lnr-arrow-right"></i>
        </div>
        <!-- Slider pagination -->
        <div class="swiper-pagination"></div>
    </div>
</div>
<!-- Slider/Intro Section End -->
@endsection

{{-- ======================== --}}

@section('categories')
<!--Categories Area Start-->
<div class="categories-area pt-40">
    <div class="container-fluid">
        @if(count($categories) < 5) <h1 style="color: red">There is No Categories Yet! Please Add Some</h1>
            @else
            <div class="row">
                @foreach ($categories as $category =>$value)
                <div class="cat-9 col-md-4 col-custom">
                    <div class="categories-img mb-30">
                        <a href="{{ route('category.show', $value->cat_id)}}"><img id="coverSlider" src="images/{{$value->category_image}}" alt="" style="height: 30rem; border-radius: 10px" /></a>
                        <div class="categories-content">
                            <h3>{{$value->category_name}}</h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
    </div>
</div>
<!--Categories Area End-->
@endsection @section('prodcuts')
<div class="row product-row">
    <div class="col-12 col-5">
        <div class="product-slider swiper-container anime-element-multi">
            @if (session('success'))

            <div class="alert alert-success col-sm-3">

                {{ session('success') }}

            </div>
            @endif
            <div class="swiper-wrapper">
                @if(count($products) == 0)
                <h1 style="color: red">
                    There is No Products Yet! Please Add Some
                </h1>
                @else @foreach ($products->shuffle() as $product =>$value)
                <div class="single-item swiper-slide">
                    <!--Single Product Start-->
                    <div class="single-product position-relative mb-30">
                        <div class="product-image" style="height: 20rem">
                            <a class="d-block" href="{{ route('product.show', $value->pro_id)}}">
                                <img src="images/{{$value->product_image}}" class="product-image-1 w-100" style="height: 20rem" />
                            </a>
                            <span class="onsale">Sale!</span>
                        </div>
                        <div class="product-content">
                            <div class="product-title">
                                <h4 class="title-2">
                                    <a href="{{ route('product.show', $value->pro_id)}}">{{$value->product_name}}</a>
                                </h4>
                            </div>
                            <div class="price-box">
                                <span class="regular-price">JOD{{$value->product_price * 0.8}}</span>
                                <span class="old-price"><del>JOD{{$value->product_price}}</del></span>
                            </div>
                            <a href="{{route('cart.show',$value->pro_id)}}" class="btn product-cart p-1" style="background-color: #e72463; color: white">Add to Cart</a>
                        </div>
                    </div>
                    <!--Single Product End-->
                </div>
                <!-- Slider pagination -->
                @endforeach @endif
            </div>
            <div class="swiper-pagination default-pagination"></div>
        </div>
    </div>
</div>
@endsection