<?php

include('includes/publicHeader.php'); ?>

<!--== Banner // Slider Area Start ==-->
<!--== Banner // Slider Area Start ==-->
<section id="banner-area" class="banner__3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div id="banner-carousel" class="owl-carousel">
          <!-- Banner Single Carousel Start -->
          <div class="single-carousel-wrap home_4_slide_1">
            <div class="banner-caption">
              <h4>New Collection 2021</h4>
              <h2>this looks beautiful</h2>
              <p>
                Eodem modo typi, qui nunc nobis videntur parum clari, fiant
                sollemnes in futurum.
              </p>
              <a href="shop.php" class="btn-long-arrow">Shop Now</a>
            </div>
          </div>
          <!-- Banner Single Carousel End -->

          <!-- Banner Single Carousel Start -->
          <div class="single-carousel-wrap home_4_slide_2">
            <div class="banner-caption">
              <h4>New Collection 2021</h4>
              <h2>Beautiful Earrings</h2>
              <p>
                Eodem modo typi, qui nunc nobis videntur parum clari, fiant
                sollemnes in futurum.
              </p>
              <a href="shop.php" class="btn-long-arrow">Shop Now</a>
            </div>
          </div>
          <!-- Banner Single Carousel End -->
        </div>
      </div>
    </div>
  </div>
</section>
<!--== Banner Slider End ==-->

<!--== About Us Area Start ==-->
<section id="aboutUs-area" class="pt-9">
  <div class="ruby-container">
    <div class="row">
      <div class="col-lg-6">
        <!-- About Image Area Start -->
        <div class="about-image-wrap">
          <a href="#"><img src="assets/img/aboutUs.jpg" alt="About Us" class="img-fluid" /></a>
        </div>
        <!-- About Image Area End -->
      </div>

      <div class="col-lg-6 m-auto">
        <!-- About Text Area Start -->
        <div class="about-content-wrap ml-0 ml-lg-5 mt-5 mt-lg-0">
          <h2>About Us</h2>
          <h3>WE ARE VISIONARY</h3>
          <div class="about-text">
            <p>
              Claritas est etiam processus dynamicus, qui sequitur
              mutationem consuetudium lectorum. Mirum est notare quam
              littera gothica, quam nunc putamus parum claram, anteposuerit
              litterarum formas humanitatis per seacula quarta decima et
              quinta decima. Eodem modo typi, qui nunc nobis videntur parum
              clari, fiant sollemnes in futurum.
            </p>

            <p>
              Typi noni habented claritatem insitamed ested usused legentis
              in iis qui facit eorum claritatem. Investigationes
              demonstraverunt lectores legere me lius quod ii loreem ipsum
              ius delour legunt saepius.
            </p>

            <h4 class="vertical-text">WHO WE ARE?</h4>
          </div>
        </div>
        <!-- About Text Area End -->
      </div>
    </div>
  </div>
</section>
<!--== About Us Area End ==-->

<!--== New Collection Area Start ==-->
<section id="new-collection-area" class="p-9">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <!-- Section Title Start -->
        <div class="section-title">
          <h2>New Collection Products</h2>
          <p>Best products on sale.</p>
        </div>
        <!-- Section Title End -->
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="new-collection-tabs">
          <!-- Tab Menu Area Start -->
          <ul class="nav tab-menu-wrap" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="active" id="feature-products-tab" data-toggle="tab" href="#feature-products" role="tab"
                aria-controls="feature-products-tab" aria-selected="true">Feature Products</a>
            </li>
            <li class="nav-item">
              <a id="new-products-tab" data-toggle="tab" href="#new-products" role="tab" aria-controls="new-products"
                aria-selected="false">Hot Products</a>
            </li>
            <li class="nav-item">
              <a id="onsale-tab" data-toggle="tab" href="#onsale" role="tab" aria-controls="onsale"
                aria-selected="false">Onsale</a>
            </li>
          </ul>
          <!-- Tab Menu Area End -->

          <!-- Tab Content Area Start -->
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="feature-products" role="tabpanel"
              aria-labelledby="feature-products-tab">
              <div class="products-wrapper">
                <div class="products-carousel owl-carousel">
                  <!-- Single Product Item -->
                  <?php
                  include("includes/db_connection.php");
                  $conn = OpenCon();
                  $sql = "SELECT * FROM products";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      echo '<div class="single-product-item text-center">
                      <figure class="product-thumb">
                        <a href="single-product.php?id='.$row["product_id"].'"><img src="images/'.$row["img_name"].'" alt="Products" class="img-fluid" /></a>
                      </figure>
                      <div class="product-details">
                        <h2>
                          <a href="single-product.php?id='.$row["product_id"].'">'.$row["name"].'</a>
                        </h2>
                        <span class="price">$'.$row["price"].'</span>
                        <a href="single-product.php?id='.$row["product_id"].'" class="btn btn-add-to-cart">+ Add to Cart</a>
                      ';
                      if ($row["is_hot"]==1 && $row["discount_price"]!=0) {
                        echo '<span class="product-bedge">HOT</span><span class="SBedge Ssale">Sale</span>';
                      }else if ($row["is_hot"]==1) {
                        echo '<span class="product-bedge">HOT</span>';
                      }
                       else if ($row["discount_price"]!=0){
                        echo '<span class="product-bedge Ssale">Sale</span>';
                       }

                      echo'
                        </div>
                    </div>';
                    }
                  } else {
                    echo "0 results";
                  }
                  ?>
                  <div class="single-product-item text-center">
                    <figure class="product-thumb">
                      <a href="single-product.php"><img src="assets/img/product-1.jpg" alt="Products"
                          class="img-fluid" /></a>
                    </figure>
                    <div class="product-details">
                      <h2>
                        <a href="shop.php">Crown Summit Backpack</a>
                      </h2>
                      <span class="price">$52.00</span>
                      <a href="single-product.php" class="btn btn-add-to-cart">+ Add to Cart</a>
                    </div>
                  </div>
                  <!-- Single Product Item -->
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="new-products" role="tabpanel" aria-labelledby="new-products-tab">
              <div class="products-wrapper">
                <div class="products-carousel owl-carousel">
                  <?php
                  $sql = "SELECT * FROM products WHERE is_hot=1";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      echo '<div class="single-product-item text-center">
                      <figure class="product-thumb">
                        <a href="single-product.php?id='.$row["product_id"].'"><img src="images/'.$row["img_name"].'" alt="Products" class="img-fluid" /></a>
                      </figure>
                      <div class="product-details">
                        <h2>
                          <a href="single-product.php?id='.$row["product_id"].'">'.$row["name"].'</a>
                        </h2>
                        <span class="price">$'.$row["price"].'</span>
                        <a href="single-product.php?id='.$row["product_id"].'" class="btn btn-add-to-cart">+ Add to Cart</a>
                        <span class="product-bedge">HOT</span>
                        </div>
                    </div>';
                    }
                  } else {
                    echo "0 results";
                  }
                  ?>
                  <!-- Single Product Item -->
                  <div class="single-product-item text-center">
                    <figure class="product-thumb">
                      <a href="single-product.php"><img src="assets/img/new-product-1.jpg" alt="Products"
                          class="img-fluid" /></a>
                    </figure>

                    <div class="product-details">
                      <h2>
                        <a href="shop.php">Crown Summit Backpack</a>
                      </h2>

                      <span class="price">$52.00</span>
                      <a href="single-product.php" class="btn btn-add-to-cart">+ Add to Cart</a>
                      <span class="product-bedge">New</span>
                    </div>


                  </div>
                  <!-- Single Product Item -->

                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="onsale" role="tabpanel" aria-labelledby="onsale-tab">
              <div class="products-wrapper">
                <div class="products-carousel owl-carousel">
                  <?php
                  $sql = "SELECT * FROM products WHERE discount_price!=0";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      echo '<div class="single-product-item text-center">
                      <figure class="product-thumb">
                        <a href="single-product.php?id='.$row["product_id"].'"><img src="images/'.$row["img_name"].'" alt="Products" class="img-fluid" /></a>
                      </figure>
                      <div class="product-details">
                        <h2>
                          <a href="single-product.php?id='.$row["product_id"].'">'.$row["name"].'</a>
                        </h2>
                        <span class="price">$'.$row["discount_price"].'</span>
                        <a href="single-product.php?id='.$row["product_id"].'" class="btn btn-add-to-cart">+ Add to Cart</a>
                        <span class="product-bedge sale">Sale</span>
                        </div>
                    </div>';
                    }
                  } else {
                    echo "0 results";
                  }
                  ?>
                  <!-- Single Product Item -->
                  <div class="single-product-item text-center">
                    <figure class="product-thumb">
                      <a href="shop.php"><img src="assets/img/sale-product-1.jpg" alt="Products"
                          class="img-fluid" /></a>
                    </figure>

                    <div class="product-details">
                      <h2>
                        <a href="shop.php">Crown Summit Backpack</a>
                      </h2>

                      <span class="price">$52.00</span>
                      <a href="single-product.php?id='.$row[" product_id"].'" class="btn btn-add-to-cart">+ Add to
                        Cart</a>
                      <span class="product-bedge sale">Sale</span>
                    </div>

                  </div>
                  <!-- Single Product Item -->


                </div>
              </div>
            </div>
          </div>
          <!-- Tab Content Area End -->
        </div>
      </div>
    </div>
  </div>
</section>
<!--== New Collection Area End ==-->

<!--== Products by Category Area Start ==-->
<div id="product-categories-area">
  <div class="ruby-container">
    <div class="row">
      <div class="col-lg-12">
        <div class="large-size-cate">
          <div class="row">
            <div class="col-md-4">
              <div class="single-cat-item">
                <figure class="category-thumb">
                  <a href="shop.php?category=9"><img src="assets/img/jewellry.jpg" alt="Women Category"
                      class="img-fluid" /></a>

                  <figcaption class="category-name">
                    <a href="shop.php?category=9">Jewelry</a>
                  </figcaption>
                </figure>
              </div>
            </div>

            <div class="col-md-4">
              <div class="single-cat-item">
                <figure class="category-thumb">
                  <a href="shop.php?category=8"><img src="assets/img/watches.jpg" alt="Men Category"
                      class="img-fluid" /></a>

                  <figcaption class="category-name">
                    <a href="shop.php?category=8">Watches</a>
                  </figcaption>
                </figure>
              </div>
            </div>
            <div class="col-md-4">
              <div class="single-cat-item">
                <figure class="category-thumb">
                  <a href="shop.php?category=10"><img src="assets/img/rings.jpg" alt="Men Category"
                      class="img-fluid" /></a>

                  <figcaption class="category-name">
                    <a href="shop.php?category=10">Rings</a>
                  </figcaption>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--== Products by Category Area End ==-->

<!--== Break Line Start  ==-->
<section id="new-products-area" class="p-9">

</section>
<!--== Break Line End ==-->

<!--== Testimonial Area Start ==-->
<section id="testimonial-area">
  <div class="ruby-container">
    <div class="testimonial-wrapper">
      <div class="row">
        <div class="col-lg-12 text-center">
          <!-- Section Title Start -->
          <div class="section-title">
            <h2>What People Say</h2>
            <p>Testimonials</p>
          </div>
          <!-- Section Title End -->
        </div>
      </div>

      <div class="row">
        <div class="col-lg-7 m-auto text-center">
          <div class="testimonial-content-wrap">
            <div class="single-testimonial-item">
              <p>
                These guys have been absolutely outstanding. When I needed
                them they came through in a big way! I know that if you
                buy this theme, you'll get the one thing we all look for
                when we buy on Themeforest, and that's real support for
                the craziest of requests!
              </p>

              <h3 class="client-name">Luis Manrata</h3>
              <span class="client-email">luismanatra@gmail.com</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--== Testimonial Area End ==-->

<!--== Newsletter Area Start ==-->
<section id="newsletter-area" class="p-9">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <!-- Section Title Start -->
        <div class="section-title">
          <h2>Join The Newsletter</h2>
          <p>Sign Up for Our Newsletter</p>
        </div>
        <!-- Section Title End -->
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 m-auto">
        <div class="newsletter-form-wrap">
          <form id="subscribe-form" action="https://d29u17ylf1ylz9.cloudfront.net/ruby-v2/ruby/assets/php/subscribe.php"
            method="post">
            <input id="subscribe" type="email" name="email" placeholder="Enter your Email  Here" required />
            <button type="submit" class="btn-long-arrow">Subscribe</button>
            <div id="result"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--== Newsletter Area End ==-->

<?php include('includes/publicFooter.php'); ?>