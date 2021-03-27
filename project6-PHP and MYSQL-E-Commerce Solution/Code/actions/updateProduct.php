<?php 
session_start();

foreach($_POST as $k => $v){
  $_SESSION["cart"][$k]["qty"]=$v;
}

header("location:../cart.php");
?>