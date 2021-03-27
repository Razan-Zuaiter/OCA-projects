<?php 
// ===========================
include "../actionProtection.php";
// ================================
if (isset($_POST["submit"])) {
    session_start();
    $name =  trim($_POST["name"]);
    $description = trim($_POST["description"]);
    $categoryID = $_POST["categoryID"];

    // ========================
    $_SESSION["market_name"]=$name;
    $_SESSION["market_desc"]=$description;
    if ($name && $description&& $categoryID) {

        
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
          
    
        $sql = "INSERT INTO marketplaces (name, img_name, description,categorie_id)
        VALUES ('$name','$db_filename', '$description','$categoryID')";
        
    
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            unset($_SESSION["market_name"]);
            unset($_SESSION["market_desc"]);
            header('Location: ../../marketplaces.php');
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          CloseCon($conn);

    }else{
        header('Location: ../../marketplaces.php?e=Please fill the required fields');
    }



}


?>