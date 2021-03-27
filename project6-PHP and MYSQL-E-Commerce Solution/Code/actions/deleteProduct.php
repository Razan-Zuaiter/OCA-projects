<?php 
session_start();
 unset($_SESSION["cart"][$_GET["k"]]);
header("location:../cart.php");
?>