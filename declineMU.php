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

$select = "UPDATE makeup SET $col = 'Declined' WHERE id='$id' ";
$result = mysqli_query($conn, $select);

if($col=='cstatus'){
	header("location:makeupController.php");
	ob_end_flush();
	exit;
}
elseif($col=='hstatus'){
	header("location:makeupHead.php");
	ob_end_flush();
	exit;
}