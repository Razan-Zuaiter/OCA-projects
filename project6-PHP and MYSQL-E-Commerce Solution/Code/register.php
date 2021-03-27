<!-- Login  -->

<?php include('includes/publicHeader.php'); ?>


<!-- Register -->
<?php  

if (isset($_POST["rsubmit"])) {
  $name      = $_POST['rname'];
  $email     = $_POST["remail"];
  $password  = $_POST["rpassword"];
  $filename = $_FILES["uploadfile"]["name"]; 
  $tempname = $_FILES["uploadfile"]["tmp_name"];  
  $db_filename =    time() .'+' .$filename;
  $folder = "./images/".$db_filename;
  if (move_uploaded_file($tempname, $folder))  { 
    $msg = "Image uploaded successfully"; 
  }else{ 
    $msg = "Failed to upload image"; 
    $db_filename = "default.jpg";
   } 
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);
  include ('./includes/db_connection.php');
  $conn = OpenCon();
  if(!empty( $name) && !empty( $email) && !empty( $password ) ){
  $sql="SELECT user_id FROM users WHERE email='$email' ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  // 
  // $_SESSION['user_id'] = $row ['user_id'];
  // $_SESSION['user_role'] = $row ['user_role'];
    if($row){
			$inputErr ='user already existed';
    }
     else{
       if($uppercase && $lowercase && $number && strlen($password) > 6) {
            $sql = "INSERT INTO users (name, email , password ,  img_name ,user_role )
           VALUES ('$name','$email', '$password', '$db_filename' ,'user')";
            if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            $_SESSION['loginUser'] = ["id" =>$last_id , "role" => 'user'];
            header('Location: ./my-account.php');
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            
    } else{
      $inputErr = 'Password dose not contain upper and lower latters';
    }
   } 
}
else {
  $inputErr = 'Field must be filled' ;
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
            <a id="login-tab" href="login.php">Login</a>
            <a class="active" id="register-tab" href="#">Register</a>
          </nav>
          <!-- Login & Register tab Menu -->

          <div class="tab-content" id="login-reg-tabcontent">
            <div>
              <div class="login-reg-form-wrap">
                <form action="" method="post" enctype="multipart/form-data">

                  <?php 
                if (isset($inputErr)) {
                  echo '<div class="alert alert-danger" role="alert">'.$inputErr.'</div>';
                }
                ?>
                  <div class="single-input-item">
                    <input type="text" placeholder="Full Name" name="rname" required />
                  </div>

                  <div class="single-input-item">
                    <input type="email" name="remail" placeholder="Enter your Email" required />
                  </div>
                  <div class="single-input-item">
                    <input type="password" name="rpassword" placeholder="Enter your Password" required />

                  </div>

                  <div class="single-input-item">
                    <input type="file" name="uploadfile" multiple="" class="form-control-file">
                  </div>

                  <div class="single-input-item">
                    <button type="submit" name="rsubmit" class="btn-login"> Register</button>
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