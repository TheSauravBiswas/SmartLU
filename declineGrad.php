<?php
ob_start();
session_start();
if(!isset($_SESSION['logger'])){
	echo '<script>alert("You have to login first.")</script>';
	header('location:login.php');
}elseif($_SESSION['logger']['indx']!="dregistrar"){
	echo "<script>alert('You do not have access to this page.')</script>";
	header('location:index.php');
}

include "config.php";

$id = $_GET['id'];

$select = "UPDATE grad SET admission ='Declined' WHERE id='$id' ";
$result = mysqli_query($conn, $select);

header("location:gradDetails.php?id=".$id);
ob_end_flush();
exit;