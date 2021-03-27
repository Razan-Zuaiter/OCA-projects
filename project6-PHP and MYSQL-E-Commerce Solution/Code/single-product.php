<?php
include('includes/publicHeader.php');
include("includes/db_connection.php");
$conn = OpenCon();
if (!isset($_GET["id"])) {
  header("location:index.php");
}
$id=$_GET["id"];
$sql = "SELECT * FROM products WHERE product_id=$id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
}
else{
header("location:index.php");
}
?>


<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
  <div class="ruby-container">
    <div class="row">
      <!-- Single Product Page Content Start -->
      <div class="col-lg-12">
        <div class="single-product-page-content">
          <div class="row">
            <!-- Product Thumbnail Start -->
            <div class="col-lg-5">
              <div class="product-thumbnail-wrap">

                <div class="single-thumb-item">
                  <a href="#"><img class="img-fluid" src="images/<?php echo $row["img_name"] ?>" alt="Product" /></a>
                </div>


              </div>
            </div>
            <!-- Product Thumbnail End -->

            <!-- Product Details Start -->
            <div class="col-lg-7 mt-5 mt-lg-0">
              <div class="product-details">
                <h2><a href="single-product.php"><?php echo $row["name"] ?></a></h2>
                <?php 
if ($row["discount_price"] ==0) {
  echo '<span class="price">$'.$row["price"].' </span>';
}else{
  echo '<del class="price">$'.$row["price"].' </del>';
  echo '<span class="price">New Price $'.$row["discount_price"].' </span>';
}
?>



                <p class="products-desc"><?php echo $row["description"] ?></p>

                <form action="actions/insertsProduct.php" method="get">
                  <div class="product-quantity d-flex align-items-center">
                    <div class="quantity-field">
                      <label for="qty">Qty</label>
                      <input type="number" name="qty" id="qty" min="1" max="100" value="1" />
                      <input type="hidden" name="id" value="<?php echo $id ?>" />
                    </div>
                    <input type="submit" class="btn btn-add-to-cart" value="Add to Cart">
                  </div>
                </form>


              </div>
            </div>
            <!-- Product Details End -->
          </div>


        </div>
        <!-- Product Full Description End -->
      </div>
    </div>
  </div>
</div>
<!-- Single Product Page Content End -->

<!--== Page Content Wrapper End ==-->


<?php include('includes/publicFooter.php'); ?>