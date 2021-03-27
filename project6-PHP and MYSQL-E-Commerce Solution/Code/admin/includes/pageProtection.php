<?php
// ===========================
if (!isset($_SESSION['loginUser'])) {
  header("location:../login.php");
}else if($_SESSION['loginUser']["role"] !=="admin"){
echo "403";
die;
}
// ================================
?>