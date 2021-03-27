<?php 

session_start();
if (!isset($_SESSION["loginUser"])) {
header("location:../login.php");
  die;
}

include ('../includes/db_connection.php');
$conn = OpenCon();
$userID=$_SESSION["loginUser"]["id"];
// =============
foreach($_SESSION["cart"] as $v){
  $sql = "INSERT INTO orders (user_id, product_id , quantity)
  VALUES ('$userID', '{$v["id"]}', '{$v["qty"]}')";
mysqli_query($conn, $sql);
}
unset($_SESSION["cart"]);
        CloseCon($conn);
header('Location: ../thankyou.php');

        
?>