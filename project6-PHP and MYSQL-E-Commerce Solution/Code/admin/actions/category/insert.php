<?php 
// ===========================
include "../actionProtection.php";
// ================================
if (isset($_POST["submit"])) {
    session_start();
    $name =  trim($_POST["name"]);
    $description = trim($_POST["description"]);

    // ========================
    $_SESSION["cat_name"]=$name;
    $_SESSION["cat_desc"]=$description;

    if ($name && $description) {
        
        include ('../db_connection.php');
        $conn = OpenCon();
    
    // ----------------------------
            $filename = $_FILES["uploadfile"]["name"]; 
            $tempname = $_FILES["uploadfile"]["tmp_name"];  
            $db_filename=    time() .'+' .$filename;
            $folder = "../../../images/".$db_filename;
            
                if (move_uploaded_file($tempname, $folder))  { 
                    $msg = "Image uploaded successfully"; 
                }else{ 
                    $msg = "Failed to upload image"; 
                    $db_filename = "default.jpg";
              } 
    // ----------------------------
          
    
        $sql = "INSERT INTO categories (name, img_name, description)
        VALUES ('$name','$db_filename', '$description')";
        
    
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            unset($_SESSION["cat_name"]);
            unset($_SESSION["cat_desc"]);
            header('Location: ../../category.php');
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          CloseCon($conn);

}else{
    header('Location: ../../category.php?e=Please fill the required fields');
}

}
   
?>