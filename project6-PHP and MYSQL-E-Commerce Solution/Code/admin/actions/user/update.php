<?php 
if (isset($_GET["id"])) {
    session_start();
    $_SESSION["U_ID"] = $_GET["id"];
}
if (isset($_POST["update"])) {
    $id=$_SESSION["U_ID"];
    // session_destroy();
    $name = $_POST["name"];
    $email = $_POST["email"];
    $rdb_value = $_POST['role'];
    include ('../db_connection.php');
    $conn = OpenCon();

    $sql = 'UPDATE users SET name = "'.$name.'",
    email="'.$email.'",user_role="'.$rdb_value.'"
      WHERE user_id='.$id;

if ($conn->query($sql) === TRUE) {
 echo "Record updated successfully";
 header("Location:../../index.php");
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
        <div class="page-container">

            <!-- MAIN CONTENT-->
        <div class="container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <h1>Manage Admin</h1>
                        <hr>

                        <div class="row">
                            <div class="col-lg">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <!-- <h3 class="text-center title-2">Pay Invoice</h3> -->
                                        </div>
                                        <!-- <hr> -->
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Name</label>
                                                <input id="name" name="name" type="text" class="form-control"
                                                    value="<?php echo $_GET["name"]?>">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="email" class="control-label mb-1">Email</label>
                                                <input id="email" name="email" type="text" class="form-control"
                                                    value="<?php echo $_GET["email"]?>">
                                            </div>
                                            <label for="user_role" class="control-label mb-1">User Role</label><br>

                                            <div class="form-check">
                                            
                                            <input class="form-check-input" type="radio" name="role" id="role1" value="admin" <?php if($_GET["user_role"] ==='admin') echo 'checked'?>  >
                                            <label class="form-check-label" for="role1">
                                                admin
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" id="role2" value="user" <?php if($_GET["user_role"] ==='user') echo 'checked'?> >
                                            <label class="form-check-label" for="role2">
                                                user
                                            </label>
                                            </div>

                                            <div>
                                                <button type="submit" name="update"
                                                    class="btn btn-lg btn-info btn-block">
                                                    Update
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
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
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