<?php
// ===========================
include "../actionProtection.php";
// ================================
if (isset($_POST["submit"])) {
    session_start();
    $name = trim($_POST["name"]);
    $description = trim($_POST["description"]);
    $price = $_POST["price"];
    $marketplaceID = $_POST["marketplaceID"];
    $discount_price = $_POST["discount_price"];

    // ========================
    $_SESSION["pro_name"]=$name;
    $_SESSION["pro_price"]=$price;
    $_SESSION["pro_desc"]=$description;
    $_SESSION["pro_discount"]=$discount_price;


    if ($name && $price&& $marketplaceID&&$description ) {
        $isHot=0;
        if (isset($_POST["isHot"])) {
            $isHot=1;
        }
        // var_dump($_POST["discount_price"]);
        if (!$_POST["discount_price"]) {
            $discount_price = null;
        } else {
        $discount_price = $_POST["discount_price"];
        }
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
    
    
        include '../db_connection.php';
        $conn = OpenCon();
    
    
    // ----------------------------
    
        $sql = "INSERT INTO products (name, price,Marketplace_id, description, img_name,is_hot ,discount_price)
    VALUES ('$name','$price','$marketplaceID', '$description', '$db_filename','$isHot','$discount_price');";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        unset($_SESSION["pro_name"]);
            unset($_SESSION["pro_price"]);
            unset($_SESSION["pro_desc"]);
            unset($_SESSION["pro_discount"]);
        header('Location: ../../product.php');
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    



}else{
    header('Location: ../../product.php?e=Please fill the required fields');
}

}