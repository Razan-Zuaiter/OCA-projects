<?php 
if (isset($_POST["submit"])) {
    session_start();
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $rdb_value = $_POST['role'];

    // ========================
    $_SESSION["name"]=$name;
    $_SESSION["email"]=$email;
    $_SESSION["password"]=$password;

    if ($name && $email && $password) {
        $isEmailValid=false;
        $isPasswordValid=false;
        $emailRegex = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/i";
        $passwordRegex = "/^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{6,}$/i";
        $passwordError=$emailError="";
        if (preg_match($emailRegex, $email)) {
            $isEmailValid=true;
        }else{
            $emailError= "Email not valid.";
        }

         preg_match($passwordRegex, $password)?$isPasswordValid= true : $passwordError="Password must contain at least one letter, at least one number, and be longer than six charaters.";
        if (!$isEmailValid || !$isPasswordValid) {
            header("Location: ../../index.php?EE=$emailError&PE=$passwordError");
            die;
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
        include ('../db_connection.php');
        $conn = OpenCon();
    
        $sql = "INSERT INTO users (name, password, email, user_role, img_name)
        VALUES ('$name', '$password', '$email','$rdb_value','$db_filename')";
        
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            unset($_SESSION["name"]);
            unset($_SESSION["email"]);
            unset($_SESSION["password"]);
            header('Location: ../../index.php');
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          CloseCon($conn);
    }
    else{
        header('Location: ../../index.php?e=Please fill the required fields');
    }
}


?>