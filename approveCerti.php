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

$select = "UPDATE certificate SET $col ='Approved' WHERE id='$id' ";
$result = mysqli_query($conn, $select);

header("location:certiStatus.php");
ob_end_flush();
exit;