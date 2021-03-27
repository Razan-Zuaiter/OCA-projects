<?php 
// ===========================
include "../actionProtection.php";
// ================================
    include ('../db_connection.php');
    $conn = OpenCon();

if (isset($_GET["id"])) {
    // session_start();
    $sql = "SELECT * FROM products WHERE product_id='{$_GET["id"]}'";
    $result = mysqli_query($conn, $sql);
    $olddata = mysqli_fetch_assoc($result);

    $_SESSION["P_ID"] = $_GET["id"];
}
if (isset($_POST["update"])) {
    $id=$_SESSION["P_ID"];
    // session_destroy();
    $name = $_POST["name"];
    $price = $_POST["price"];
    $marketplaceID = $_POST["marketplaceID"];
    $description = $_POST["description"];
    $isHot=0;
 if (isset($_POST["isHot"])) {
     $isHot=1;
 }

    // ----------------------------
    if ($_FILES["uploadfile"]["name"]){

      $filename = $_FILES["uploadfile"]["name"];
      $tempname = $_FILES["uploadfile"]["tmp_name"];  
      $db_filename=    time() .'+' .$filename;
      $folder = "../../../images/".$db_filename;
      
          if (move_uploaded_file($tempname, $folder))  { 
              $msg = "Image uploaded successfully"; 
          }else{ 
              $msg = "Failed to upload image"; 
              $db_filename = "default.jpg";
        } 
  // ----------------------------
      $sql = 'UPDATE products SET name = "'.$name.'",
      description="'.$description.'",
      img_name="'.$db_filename.'",
      Marketplace_id="'.$marketplaceID.'",
      is_hot="'.$isHot.'",
      price="'.$price.'"
        WHERE product_id='.$id;
    }
    else {
      $sql = 'UPDATE products SET name = "'.$name.'",
      description="'.$description.'",
      Marketplace_id="'.$marketplaceID.'",
      is_hot="'.$isHot.'",
      price="'.$price.'"
        WHERE product_id='.$id;
    }

if ($conn->query($sql) === TRUE) {
 echo "Record updated successfully";
 header("Location:../../product.php");
} else {
 echo "Error updating record: " . $conn->error;
}
}
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
  <link href="../../css/font-face.css" rel="stylesheet" media="all">
  <link href="../../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="../../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="../../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

  <!-- Bootstrap CSS-->
  <link href="../../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

  <!-- Vendor CSS-->
  <link href="../../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  <link href="../../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
  <link href="../../vendor/wow/animate.css" rel="stylesheet" media="all">
  <link href="../../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
  <link href="../../vendor/slick/slick.css" rel="stylesheet" media="all">
  <link href="../../vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="../../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <!-- <link href="css/theme.css" rel="stylesheet" media="all"> -->

</head>

<body class="animsition">
  <div class="page-wrapper">
    <!-- HEADER MOBILE-->

    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->

    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container container">

      <!-- MAIN CONTENT-->
      <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <h1>Update Product</h1>
            <hr>
            <div class="row">
              <div class="col-lg">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title">
                      <!-- <h3 class="text-center title-2">Pay Invoice</h3> -->
                    </div>
                    <!-- <hr> -->
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="name" class="control-label mb-1">Name</label>
                        <input id="name" name="name" type="text" class="form-control"
                          value="<?php echo $olddata["name"]?>">
                      </div>
                      <div class="form-group has-success">
                        <label for="price" class="control-label mb-1">Price</label>
                        <input id="price" step="0.01" min="0" name="price" type="number" class="form-control"
                          value="<?php echo $olddata["price"]?>">
                      </div>
                      <div class="form-group has-success">
                        <input type="file" name="uploadfile" />
                      </div>
                      <div class="form-group has-success">
                        <input type="checkbox" id="Hot" name="isHot" value="hot"
                          <?php echo  $olddata["is_hot"] == 1 ? "checked": "" ?>>
                        <label for="Hot">Hot Product 🔥</label><br>
                      </div>
                      <div class="form-group has-success">
                        <label for="description" class="control-label mb-1">marketplace</label>
                        <select class="form-select" aria-label="Default select example" name="marketplaceID">
                          <?php
                          include ('actions/db_connection.php');
                          $conn = OpenCon();
                      
                          $sql = "SELECT Marketplace_id,name FROM marketplaces";
                          $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                            if ($olddata["Marketplace_id"]===$row["Marketplace_id"])
                              echo '<option selected value="'.$row["Marketplace_id"].'">'.$row["name"].'</option>';
                              else
                              echo '<option value="'.$row["Marketplace_id"].'">'.$row["name"].'</option>';

                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group has-success">
                        <label for="description" class="control-label mb-1">Description</label>
                        <textarea class="form-control" id="description" name="description"
                          rows="4"><?php echo $olddata["price"]?></textarea>
                      </div>
                      <div>
                        <button name="update" type="submit" class="btn btn-lg btn-primary btn-block">
                          Add
                        </button>
                      </div>
                    </form>
                  </div>
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
    </div>

  </div>

  <!-- Jquery JS-->
  <script src="../../vendor/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap JS-->
  <script src="../../vendor/bootstrap-4.1/popper.min.js"></script>
  <script src="../../vendor/bootstrap-4.1/bootstrap.min.js"></script>
  <!-- Vendor JS       -->
  <script src="../../vendor/slick/slick.min.js">
  </script>
  <script src="../../vendor/wow/wow.min.js"></script>
  <script src="../../vendor/animsition/animsition.min.js"></script>
  <script src="../../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
  </script>
  <script src="../../vendor/counter-up/jquery.waypoints.min.js"></script>
  <script src="../../vendor/counter-up/jquery.counterup.min.js">
  </script>
  <script src="../../vendor/circle-progress/circle-progress.min.js"></script>
  <script src="../../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../../vendor/chartjs/Chart.bundle.min.js"></script>
  <script src="../../vendor/select2/select2.min.js">
  </script>

  <!-- Main JS-->
  <script src="../../js/main.js"></script>

</body>

</html>
<!-- end document-->