<?php 
ob_start();
session_start();

if(isset($_SESSION['admin_login'])) {

 header("Location:site_options/index.php");

} else { header("Location:login.php"); }



?>