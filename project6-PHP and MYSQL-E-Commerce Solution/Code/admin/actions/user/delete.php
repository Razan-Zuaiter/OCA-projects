<?php 
if ($_GET["d"]) {
    $id = $_GET["d"];
    
    include ('../db_connection.php');
    $conn = OpenCon();

    $sql = "DELETE FROM users WHERE user_id={$_GET["d"]}";

    if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
      header('Location: ../../index.php');

    } else {
      echo "Error deleting record: " . $conn->error;
    }
      CloseCon($conn);
}

?>