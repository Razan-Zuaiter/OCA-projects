<?php 
include('includes/publicHeader.php');
include("includes/db_connection.php");
$conn = OpenCon();

?>


<div id="page-content-wrapper" class="p-9">
  <div class="container">
    <div class="row">
      <!-- Sidebar Area Start -->
      <div class="col-lg-3 mt-5 mt-lg-0 order-last order-lg-first">
        <div id="sidebar-area-wrap">
          <!-- Single Sidebar Item Start -->
          <div class="single-sidebar-wrap">
            <h2 class="sidebar-title">Shop By</h2>
            <div class="sidebar-body">
              <div class="shopping-option">
                <h3>Shopping Options</h3>

                <div class="shopping-option-item">
                  <h4>MANUFACTURER</h4>
                  <ul class="sidebar-list">
                    <?php 
                    $sql = 'SELECT categorie_id, name FROM categories';
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                      echo '<li><a href="?category='.$row["categorie_id"].'">'.$row["name"].'</a></li>';
                    }
                    ?>

                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Single Sidebar Item End -->
        </div>
      </div>
      <!-- Sidebar Area End -->

      <!-- Shop Page Content Start -->
      <div class="col-lg-9">
        <div class="shop-page-content-wrap">
          <div class="products-settings-option d-block">
            <div class="product-cong-left d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <ul class="product-view d-flex align-items-center">
                  <li class="current column-gird">
                    <i class="fa fa-bars fa-rotate-90"></i>
                  </li>
                  <li class="box-gird"><i class="fa fa-th"></i></li>
                  <li class="list"><i class="fa fa-list-ul"></i></li>
                </ul>

              </div>

              <form action="" class="d-flex align-items-center">
                <input type="text" name="name" class="form-control Search" placeholder="&#xf002; Search">
              </form>
            </div>
          </div>

          <!-- <div class="shop-page-products-wrap">
            <div class="products-wrapper">
              <div class="row">
                <div class="col-lg-4 col-sm-6">
                
             
                </div>
              </div>
            </div>
          </div>
        </div> -->
          <div class="shop-page-products-wrap">
            <div class="products-wrapper">
              <div class="row">
                <?php 


if (isset($_GET["name"])) {
  $sql = 'SELECT * FROM products WHERE name LIKE "%'.$_GET["name"].'%"';
  
  }else if (isset($_GET["category"])) {
  $sql = 'SELECT Marketplace_id FROM marketplaces WHERE categorie_id='.$_GET["category"];
  $result = mysqli_query($conn, $sql);
  $Marketplace_id = mysqli_fetch_assoc($result);
  $sql = "SELECT * FROM products WHERE Marketplace_id = {$Marketplace_id["Marketplace_id"]}";
  }
  else{
    $sql = "SELECT * FROM products";
  }
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo '
                <div class="col-lg-4 col-sm-6">
                  <div class="single-product-item text-center">
                    <figure class="product-thumb">
                      <a href="single-product.php?id='.$row["product_id"].'"><img src="images/'.$row['img_name'].'" alt="Products" class="img-fluid" /></a>
                    </figure>

                    <div class="product-details">
                      <h2>
                        <a href="single-product.php?id='.$row["product_id"].'">'.$row['name'].'</a>
                      </h2>';

                      if ($row["discount_price"] ==0) {
                        echo '<span class="price">$'.$row["price"].' </span>';
                      }else{
                        echo '<del class="price">$'.$row["price"].' </del>';
                        echo '<span class="price">New Price $'.$row["discount_price"].' </span>';
                      }

                      echo'<p class="products-desc">'.$row['description'].'</p>
                    
                      <a href="single-product.php?id='.$row["product_id"].'" class="btn btn-add-to-cart">+ Add to Cart</a>
                      </div>
                  </div>

                
       </div>';
    }
  }
  else{
    echo "no result found";
  }
?>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- Shop Page Content End -->
    </div>
  </div>
</div>
<!--== Page Content Wrapper End ==-->

<?php include('includes/publicFooter.php'); ?>