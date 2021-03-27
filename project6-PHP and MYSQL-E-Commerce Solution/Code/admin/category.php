<?php
$page='Manage Category';
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
    <!-- HEADER MOBILE -->
    <?php 
            include 'includes/HEADER_MOBILE.php'
            ?>
    <!-- END HEADER MOBILE -->

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
            <h1>Manage category</h1>
            <hr>
            <div class="row">
              <div class="col-lg">
                <h2 class="title-1 m-b-25">Add Category</h2>
                <div class="card">
                  <div class="card-body">
                    <div class="card-title">
                      <!-- <h3 class="text-center title-2">Pay Invoice</h3> -->
                    </div>
                    <!-- <hr> -->
                    <form action="actions/category/insert.php" method="post" enctype="multipart/form-data">
                      <?php 
                      if (isset($_GET["e"])) {
                        echo '<div class="alert alert-danger" role="alert">'.$_GET["e"].'</div>';
                      }
                      ?>
                      <div class="form-group">
                        <label for="name" class="control-label mb-1">Name</label>
                        <input value="<?php echo(isset($_SESSION["cat_name"])?  $_SESSION["cat_name"] : "") ?>"
                          id="name" name="name" type="text" class="form-control">
                      </div>
                      <div class="form-group has-success">
                        <input type="file" name="uploadfile" value="" />
                      </div>
                      <div class="form-group has-success">
                        <label for="description" class="control-label mb-1">Description</label>
                        <textarea class="form-control" id="description" name="description"
                          rows="4"><?php echo(isset($_SESSION["cat_desc"])?  $_SESSION["cat_desc"] : "") ?></textarea>
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
                        <th>description</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $sql = "SELECT * FROM categories";
                      $result = mysqli_query($conn, $sql);
                      while($row = mysqli_fetch_assoc($result)) {
                      echo "<tr><td>".$row["name"]."</td><td><img src='../images/".$row["img_name"]."'></td><td><p>".$row["description"]."</p></td><td><a class='btn btn-info' href='actions/category/update.php?id={$row['categorie_id']}'>Update</a></td><td><a class='btn btn-danger' href='actions/category/delete.php?id={$row['categorie_id']}'>delete</a></td></tr>";
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