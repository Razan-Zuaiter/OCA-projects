<?php 
session_start();
 $_SESSION["cart"][]= ["id"=>$_GET["id"] , "qty"=>$_GET["qty"]];
header("location:../cart.php");
?>