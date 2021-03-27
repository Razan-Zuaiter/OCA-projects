@extends('layouts.shopTemp')

@section('shop_content')


<div class="breadcrumbs-area position-relative">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <div class="breadcrumb-content position-relative section-content">
          <h3 class="title-3">Shop Sidebar</h3>
          <ul>
            <li><a href="index">Home</a></li>
            <li>Shop</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- Shop Main Area Start Here -->
<div class="shop-main-area">
  <div class="container container-default custom-area">
    <div class="row flex-row-reverse">
      <div class="col-lg-9 col-12 col-custom widget-mt">
        <!--shop toolbar start-->
        <div class="shop_toolbar_wrapper mb-30">
          <div class="shop_toolbar_btn">
            <button data-role="grid_3" type="button" class="active btn-grid-3" title="Grid">
              <i class="fa fa-th"></i>
            </button>
            <button data-role="grid_list" type="button" class="btn-list" title="List">
              <i class="fa fa-th-list"></i>
            </button>
          </div>

        </div>
        <!--shop toolbar end-->
        <!-- Shop Wrapper Start -->

        <div class="row shop_wrapper grid_3">
          @foreach ($products as $product =>$value)
          <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
            <div class="product-item">
              <div class="single-product position-relative mr-0 ml-0">
                <div class="product-image" style="height:20rem">
                  <a class="d-block" href="{{ route('product.show', $value->pro_id)}}">
                    <img src="images/{{$value->product_image}}" alt="" class="product-image-1 w-100" style="height:20rem" />
                  </a>
                </div>
                <div class="product-content">
                  <div class="product-title">
                    <h4 class="title-2">
                      <a href="{{ route('product.show', $value->pro_id)}}">{{$value->product_name}}</a>
                    </h4>
                  </div>

                  <div class="price-box">
                    <span class="regular-price">JOD {{$value->product_price}}</span>
                  </div>
                  <a href="{{route('cart.show',$value->pro_id)}}" class="btn product-cart p-1" style="background-color:#E72463 ; color:white">Add to Cart</a>
                </div>
                <div class="product-content-listview">
                  <div class="product-title">
                    <h4 class="title-2">
                      <a href="product-details.html">{{$value->product_name}}</a>
                    </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <!-- Shop Wrapper End -->
        <!-- Bottom Toolbar Start -->
        <div class="row">
          <div class="col-sm-12 col-custom">
            <div class="toolbar-bottom">
              <div class="pagination">
                <ul>
                  <li class="current">1</li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li class="next"><a href="#">next</a></li>
                  <li><a href="#">&gt;&gt;</a></li>
                </ul>
              </div>
              <p class="desc-content text-center text-sm-right mb-0">
                Number of Products : {{count($products)}}
              </p>
            </div>
          </div>
        </div>
        <!-- Bottom Toolbar End -->
      </div>
      <div class="col-lg-3 col-12 col-custom">
        <!-- Sidebar Widget Start -->
        <aside class="sidebar_widget widget-mt">
          <div class="widget_inner">
            <div class="widget-list widget-mb-1">
              <h3 class="widget-title">Search</h3>
              <div class="search-box">
                <div class="input-group">
                  <form action="search" method="post" style="display:flex">
                    @csrf
                    <input type="text" name="search" class="form-control" style="width:12rem" />
                    <button type="submit" class="btn btn-outline-secondary"><i class="fa fa-search"></i></button>
                  </form>
                </div>
              </div>
            </div>


            <div class="widget-list widget-mb-3">
              <h3 class="widget-title">Categories</h3>
              <div class="sidebar-body">
                @foreach ($categories as $category =>$value)

                <ul class="tags">

                  <li><a href="{{ route('category.show', $value->cat_id)}}">{{ $value->category_name}}</a></li>


                </ul>
                @endforeach
              </div>
            </div>

          </div>
        </aside>
        <!-- Sidebar Widget End -->
      </div>
    </div>
  </div>
</div>
@endsection