<?php

@include 'config.php';

session_start();
if(!isset($_SESSION['logger'])){
	echo "<script>alert('You have to login first.')</script>";
	header('location:login.php');
}
session_unset();
session_destroy();

header('location:index.php');

?>