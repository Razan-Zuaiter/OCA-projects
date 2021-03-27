<?php 
// ===========================
include "../actionProtection.php";
// ================================
if ($_GET["id"]) {
    $id = $_GET["id"];
    
    include ('../db_connection.php');
    $conn = OpenCon();

    $sql = "DELETE FROM marketplaces WHERE Marketplace_id={$_GET["id"]}";

    if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
      header('Location: ../../marketplaces.php');

    } else {
      echo "Error deleting record: " . $conn->error;
    }
      CloseCon($conn);
}

?>