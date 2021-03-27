<?php include('includes/publicHeader.php'); ?>
<?php
 include ('includes/db_connection.php');
 $conn = OpenCon();


//<!--====================Fetch old data============================--> 
$query  = "select * from users where user_id = {$_SESSION['loginUser']["id"]}";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);


//<!--====================Form  update============================--> 
if(isset($_POST['update'])){
    $name         =   $_POST["name"];
    $old_password = $_POST["old_password"];
    $password     =   $_POST["password"];
    $cpassword    =   $_POST["cpassword"];


//<!--====================Upload File image============================-->    
  $filename = $_FILES["uploadfile"]["name"]; 
  $tempname = $_FILES["uploadfile"]["tmp_name"];  
  $db_filename =    time() .'+' .$filename;
  $folder = "images/".$db_filename;

  if (move_uploaded_file($tempname, $folder))  { 
    $msg = "Image uploaded successfully"; 
  }else{ 
    $msg = "Failed to upload image"; 
    $db_filename = "default.jpg";
   } 


//<!--====================Check password then insert============================--> 
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

 if($row['password'] == $old_password){
    if($uppercase && $lowercase && $number && strlen($password) > 6)
      {    if( $password  ==  $cpassword ){
             $query = "UPDATE users SET  name = '$name',
	                                     password = '$password',
                                         img_name  = '$db_filename'                         
                                WHERE user_id={$_SESSION['loginUser']["id"]}";
                               
                    if ($conn->query($query) === TRUE) {
                    echo "Record updated successfully";
                    header("Location:my-account.php");
                    } else {
                    echo "Error updating record: " . $conn->error;
                    }
      }  else{
        $inputErr = "Password dose not match";
      }
    }else{
    $inputErr = "Password  not correct must contain upper and lower letters and number";
    }


    }else{
        $inputErr = "Wrong Password";

     }
 }

 ?>
<!--====================Form delete============================-->
<?php
if(isset($_POST['delete'])){
$query = "DELETE from users where user_id ={$_SESSION['loginUser']["id"]}";
mysqli_query($conn,$query);
header("location:register.php");
}
?>



<!--== Page Title Area Start ==-->
<div id="page-title-area">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <div class="page-title-content">
          <h1>Dashboard</h1>
          <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="login-register.html" class="active">Change Account Details</a></li>
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
      <div class="col-lg-12">
        <!-- My Account Page Start -->
        <div class="myaccount-page-wrapper">
          <!-- My Account Tab Menu Start -->
          <div class="row">
            <div class="col-lg-3">
              <div class="myaccount-tab-menu nav" role="tablist">
                <a href="my-account.php"><i class="fa fa-dashboard"></i>
                  Profile</a>
                <a href="#" class="active"><i class="fa fa-user"></i> Change Account
                  Details</a>

                <a href="./logout.php"><i class="fa fa-sign-out"></i>Logout</a>
              </div>
            </div>
            <!-- My Account Tab Menu End -->

            <!-- My Account Tab Content Start -->
            <div class="col-lg-9 mt-5 mt-lg-0">
              <div class="tab-content" id="myaccountContent">
                <!-- Single Tab Content Start -->
                <div class="tab-pane fade" id="dashboad" role="tabpanel">
                  <div class="myaccount-content">
                    <h3> <?php echo "Welcome {$row['name']}"?></h3>
                    <div class="Welcome">


                      <?php 	echo "<img src='images/{$row['img_name']}'  alt='myimage' style='width:17rem; height:20;'>";
                                          
                                          ?>


                      <?php    print_r( $row['email'] );  
                                             ?>



                    </div>

                  </div>
                </div>
                <!-- Single Tab Content End -->

                <!-- Single Tab Content Start -->
                <div class="tab-pane fade" id="orders" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Orders</h3>

                    <div class="myaccount-table table-responsive text-center">
                      <table class="table table-bordered">
                        <thead class="thead-light">
                          <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Aug 22, 2018</td>
                            <td>Pending</td>
                            <td>$3000</td>
                            <td><a href="cart.html" class="btn-add-to-cart">View</a></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>July 22, 2018</td>
                            <td>Approved</td>
                            <td>$200</td>
                            <td><a href="cart.html" class="btn-add-to-cart">View</a></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>June 12, 2017</td>
                            <td>On Hold</td>
                            <td>$990</td>
                            <td><a href="cart.html" class="btn-add-to-cart">View</a></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- Single Tab Content End -->

                <!-- Single Tab Content Start -->
                <div class="tab-pane fade show active" id="account-info" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Change Account Details</h3>

                    <div class="account-details-form">
                      <form action="" method="post" enctype="multipart/form-data">
                        <?php  if (isset($inputErr)) { echo '<div class="alert alert-danger" role="alert">'.$inputErr.'</div>'; } ?>
                        <div class="single-input-item">
                          <label for="display-name" class="required">New Full Name</label>
                          <input type="text" id="display-name" placeholder="Display Name" name="name" />
                        </div>

                        <div class="single-input-item">
                          <label for="current-pwd" class="required">Current
                            Password</label>
                          <input type="password" id="current-pwd" placeholder="Current Password" name="old_password" />
                        </div>
                        <div class="single-input-item">
                          <label for="current-pwd" class="required">New
                            Password</label>
                          <input type="password" id="current-pwd" placeholder="Current Password" name="password" />
                        </div>
                        <div class="single-input-item">
                          <label for="current-pwd" class="required">Confirm Password</label>

                          <input type="password" id="current-pwd" placeholder="Current Password" name="cpassword" />
                        </div>

                        <div class="single-input-item">
                          <label for="new-pwd" class="required">New Image</label>
                          <input type="file" id="file-multiple-input" name="uploadfile" multiple=""
                            class="form-control-file">
                        </div>



                        <div class="row d-flex justify-content-space-around">
                          <div class="single-input-item">
                            <button class="btn-login btn-add-to-cart" name="update" type="submit">Save Changes</button>
                          </div>


                          <div class="single-input-item">
                            <button class="btn-danger btn-login btn-add-to-cart" name="delete" type="submit"
                              style='margin:1rem 5rem;'>Delete Account</button>
                          </div>

                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Single Tab Content End -->
              </div>
            </div>
            <!-- My Account Tab Content End -->
          </div>
        </div>
        <!-- My Account Page End -->
      </div>
    </div>
  </div>
</div>
<!--== Page Content Wrapper End ==-->



<?php include('includes/publicFooter.php'); ?>