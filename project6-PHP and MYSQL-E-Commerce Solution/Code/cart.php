<?php include('includes/publicHeader.php'); ?>

<!--== Page Content Wrapper Start ==-->
<?php 
if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
  echo   
  
  
  '<center style=" margin-top: 15rem;"> <h2 style=" font-family: sans-serif !important;">THE CART IS EMPTY</h2></center>
  <div class="text-center">
      <img src="https://i1.wp.com/www.huratips.com/wp-content/uploads/2019/04/empty-cart.png?resize=603%2C288&ssl=1

      " alt="Cart is empty">

 <div class="product-details">
  <a href="shop.php" class="btn-login stretched-link btn-add-to-cart">Return to Shop</a>
</div>

  </div>';
 die;
}
?>


<div id="page-content-wrapper" class="p-9">
  <div class="container">
    <div class="row">
      <form action="actions/updateProduct.php" method="post">
        <div class="col-lg-12">
          <div class="cart-table table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="pro-thumbnail">Thumbnail</th>
                  <th class="pro-title">Product</th>
                  <th class="pro-price">Price</th>
                  <th class="pro-quantity">Quantity</th>
                  <th class="pro-subtotal">Total</th>
                  <th class="pro-remove">Remove</th>
                </tr>
              </thead>
              <tbody>

                <?php
                include("includes/db_connection.php");
                $conn = OpenCon();
                $cartTotal=0;

              foreach($_SESSION["cart"] as $k=> $pro){
                $sql = "SELECT * FROM products WHERE product_id={$pro["id"]}";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $proTotal=$pro["qty"]*$row["price"];
                $cartTotal += $proTotal;
                echo '<tr>
                <td class="pro-thumbnail"><img class="img-fluid" src="images/'.$row["img_name"].'"
                      alt="Product" /></td>
                <td class="pro-title">'.$row["name"].'</td>
                <td class="pro-price"><span>$'.$row["price"].'</span></td>
                <td class="pro-quantity">
                  <div class="pro-qty"><input type="text" name="'.$k.'" value="'.$pro["qty"].'"></div>
                </td>
                <td class="pro-subtotal"><span>$'. $proTotal  .'</span></td>
                <td class="pro-remove"><a href="actions/deleteProduct.php?k='.$k.'"><i class="fa fa-trash-o"></i></a></td>
              </tr>';
              }
              ?>

              </tbody>
            </table>
          </div>

          <!-- Cart Update Option -->
          <div class="cart-update-option d-block d-lg-flex">

            <div class="cart-update">
              <input type="submit" class="btn-add-to-cart" value="Update Cart">
            </div>
          </div>

        </div>
      </form>

    </div>

    <div class="row">
      <div class="col-lg-6 ml-auto">
        <!-- Cart Calculation Area -->
        <div class="cart-calculator-wrapper">
          <h3>Cart Totals</h3>
          <div class="cart-calculate-items">
            <div class="table-responsive">
              <table class="table table-bordered">

                <tr>
                  <td>Total</td>
                  <td class="total-amount">$<?php echo $cartTotal ?></td>
                </tr>
              </table>
            </div>
          </div>
          <a href="actions/order.php" class="btn-add-to-cart">Checkout</a>
        </div>
      </div>
    </div>
    <!-- Cart Page Content End -->
  </div>
</div>
<!--== Page Content Wrapper End ==-->


<?php include('includes/publicFooter.php'); ?>