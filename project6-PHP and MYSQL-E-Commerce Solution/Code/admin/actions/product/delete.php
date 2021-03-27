<?php 
// ===========================
include "../actionProtection.php";
// ================================
if ($_GET["id"]) {
    $id = $_GET["id"];
    
    include ('../db_connection.php');
    $conn = OpenCon();

    $sql = "DELETE FROM products WHERE product_id=$id";

    if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
      CloseCon($conn);
      header('Location: ../../product.php');

    } else {
      echo "Error deleting record: " . $conn->error;
    }
}

?>