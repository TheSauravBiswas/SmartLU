<?php
ob_start();
session_start();
if(!isset($_SESSION['logger'])){
	echo '<script>alert("You have to login first.")</script>';
	header('location:login.php');
}

include "config.php";

$col = $_GET['col'];
$id = $_GET['id'];

$select = "UPDATE tuitionfees SET $col = 'Declined' WHERE id='$id' ";
$result = mysqli_query($conn, $select);

if($col=='hstatus'){
	header("location:70Head.php");
	ob_end_flush();
	exit;
}
elseif($col=='registrar'){
	header("location:70Registrar.php");
	ob_end_flush();
	exit;
}