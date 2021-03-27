<?php include('includes/publicHeader.php'); ?>
<?php
include ('./includes/db_connection.php');
$conn = OpenCon();
if(isset($_POST['submit'])){
  $email     =$_POST["email"];
  $password  =$_POST["password"];
  $sql="SELECT user_id, user_role FROM users WHERE  email ='$email'  AND  password= '$password' ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if ($row)
  {
 $_SESSION['loginUser'] = [ "id" =>$row ['user_id'] , "role" =>$row ['user_role'] ];
     header("location:./my-account.php");
  }
  else
  {
    $loginErr = 'Wrong email or password';
  }
}
?>






<!--== Page Title Area Start ==-->
<div id="page-title-area">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <div class="page-title-content">
          <h1>Member Area</h1>
          <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li>
              <a href="login-register.php" class="active">Login & Register</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--== Page Title Area End ==-->

<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 m-auto">
        <!-- Login & Register Content Start -->
        <div class="login-register-wrapper">
          <!-- Login & Register tab Menu -->
          <nav class="nav login-reg-tab-menu">
            <a class="active" id="login-tab" href="#">Login</a>
            <a id="register-tab" href="register.php">Register</a>
          </nav>
          <!-- Login & Register tab Menu -->

          <div class="tab-content" id="login-reg-tabcontent">
            <div class="tab-pane fade show active" id="login" role="tabpanel">
              <div class="login-reg-form-wrap">
                <form action="#" method="post">

                  <?php 
                if (isset($loginErr)) {
                  echo '<div class="alert alert-danger" role="alert">'.$loginErr.'</div>';
                }
                ?>
                  <div class="single-input-item">
                    <input type="email" placeholder="Enter your Email" name="email" required />
                  </div>

                  <div class="single-input-item">
                    <input type="password" name="password" placeholder="Enter your Password" required />
                  </div>

                  <div class="single-input-item">
                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                    </div>
                  </div>

                  <div class="single-input-item">
                    <button class="btn-login" type="submit" name="submit">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Login & Register Content End -->
      </div>
    </div>
  </div>
</div>

<!--== Page Content Wrapper End ==-->

<?php include('includes/publicFooter.php'); ?>