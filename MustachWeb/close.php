<?php
  session_start();
  include("conexion.php");
	$con=conectarse();


  unset($_SESSION['ok']);
  session_destroy();
  header("location: index.php");
  exit;
?>