<?php
$page='Manage products';
session_start();
// ===========================
include "includes/pageProtection.php";
// ================================

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="au theme template">
  <meta name="author" content="Hau Nguyen">
  <meta name="keywords" content="au theme template">

  <!-- Title Page-->
  <title>Dashboard</title>

  <!-- Fontfaces CSS-->
  <link href="css/font-face.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

  <!-- Bootstrap CSS-->
  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

  <!-- Vendor CSS-->
  <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
  <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
  <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
  <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="css/theme.css" rel="stylesheet" media="all">
  <!-- ====================================== -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="animsition">
  <div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <?php 
            include 'includes/HEADER_MOBILE.php'
            ?>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <?php 
            include 'includes/MENU_SIDEBAR.php'
            ?>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
      <?php 
            include 'includes/HEADER_DESKTOP.php'
            ?>
      <!-- MAIN CONTENT-->
      <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <h1>Manage products</h1>
            <hr>
            <div class="row">
              <div class="col-lg">
                <h2 class="title-1 m-b-25">Add product</h2>
                <div class="card">
                  <div class="card-body">
                    <div class="card-title">
                      <!-- <h3 class="text-center title-2">Pay Invoice</h3> -->
                    </div>
                    <!-- <hr> -->
                    <form action="actions/product/insert.php" method="post" enctype="multipart/form-data">
                      <?php 
                      if (isset($_GET["e"])) {
                        echo '<div class="alert alert-danger" role="alert">'.$_GET["e"].'</div>';
                      }
                      ?>
                      <div class="form-group">
                        <label for="name" class="control-label mb-1">Name</label>
                        <input value="<?php echo(isset($_SESSION["pro_name"])?  $_SESSION["pro_name"] : "") ?>"
                          id="name" name="name" type="text" class="form-control">
                      </div>
                      <div class="form-group has-success">
                        <label for="price" class="control-label mb-1">Price</label>
                        <input value="<?php echo(isset($_SESSION["pro_price"])?  $_SESSION["pro_price"] : "") ?>"
                          id="price" name="price" type="number" step="0.01" min="0" class="form-control">
                      </div>
                      <div class="form-group has-success">
                        <label for="discount" class="control-label mb-1">Discount Price</label>
                        <input value="<?php echo(isset($_SESSION["pro_discount"])?  $_SESSION["pro_discount"] : "") ?>"
                          id="discount" name="discount_price" placeholder="optional" type="number" step="0.01" min="0"
                          class="form-control">
                      </div>
                      <div class="form-group has-success">
                        <input type="file" name="uploadfile" />
                      </div>
                      <div class="form-group has-success">
                        <input type="checkbox" id="Hot" name="isHot" value="hot">
                        <label for="Hot">Hot Product 🔥</label><br>
                      </div>
                      <div class="form-group has-success">
                        <label for="description" class="control-label mb-1">marketplace</label>
                        <select class="form-select" aria-label="Default select example" name="marketplaceID">
                          <option disabled selected value> -- select an marketplace -- </option>
                          <?php
                      
                          $sql = "SELECT marketplace_id,name FROM marketplaces";
                          $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                              echo '<option value="'.$row["marketplace_id"].'">'.$row["name"].'</option>';
                          }
                            
                          
                          ?>
                        </select>
                      </div>
                      <div class="form-group has-success">
                        <label for="description" class="control-label mb-1">Description</label>
                        <textarea class="form-control" id="description" name="description"
                          rows="4"><?php echo(isset($_SESSION["pro_desc"])?  $_SESSION["pro_desc"] : "") ?></textarea>
                      </div>
                      <div>
                        <button name="submit" type="submit" class="btn btn-lg btn-primary btn-block">
                          Add
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg">
                <h2 class="title-1 m-b-25">Earnings By Items</h2>
                <div class="table-responsive table--no-card m-b-40">
                  <table class="table table-borderless table-striped table-earning">
                    <thead>
                      <tr>
                        <th>name</th>
                        <th>Img</th>
                        <th>Hot</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>marketplace</th>
                        <th>description</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
												$sql = "SELECT * FROM products";
												$result = mysqli_query($conn, $sql);
												while($row = mysqli_fetch_assoc($result)) {
                          $sql2 = "SELECT name FROM marketplaces WHERE Marketplace_id= '{$row["Marketplace_id"]}'";
												$result2 = mysqli_query($conn, $sql2);
												$MarketplaceName = mysqli_fetch_assoc($result2);

                          echo "<tr><td>".$row["name"]."</td><td><img src='../images/".$row["img_name"]."'></td>
                          <td>"; 
                          if($row["is_hot"] == 1) echo"🔥"; else  echo"➖";
                          echo"</td>
                          <td>$".$row["price"]."</td>
                          <td>"; 
                          if($row["discount_price"] == 0) echo"⛔";
                           else  echo "$" . $row["discount_price"];
                          echo"</td>
                          <td>".$MarketplaceName["name"]."</td>
														<td><p>".$row["description"]."</p></td><td><a class='btn btn-info' href='actions/product/update.php?id={$row['product_id']}'>Update</a></td><td><a class='btn btn-danger' href='actions/product/delete.php?id={$row['product_id']}'>delete</a></td></tr>";
												}
												CloseCon($conn);
											?>
                    </tbody>

                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="copyright">
                  <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                      href="https://colorlib.com">Colorlib</a>.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END MAIN CONTENT-->
      <!-- END PAGE CONTAINER-->
    </div>

  </div>

  <!-- Jquery JS-->
  <script src="vendor/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap JS-->
  <script src="vendor/bootstrap-4.1/popper.min.js"></script>
  <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
  <!-- Vendor JS       -->
  <script src="vendor/slick/slick.min.js">
  </script>
  <script src="vendor/wow/wow.min.js"></script>
  <script src="vendor/animsition/animsition.min.js"></script>
  <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
  </script>
  <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendor/counter-up/jquery.counterup.min.js">
  </script>
  <script src="vendor/circle-progress/circle-progress.min.js"></script>
  <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="vendor/chartjs/Chart.bundle.min.js"></script>
  <script src="vendor/select2/select2.min.js">
  </script>

  <!-- Main JS-->
  <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->