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

$select = "UPDATE library SET $col = 'Declined' WHERE id='$id' ";
$result = mysqli_query($conn, $select);

if($col=='hstatus'){
	header("location:libHead.php");
	ob_end_flush();
	exit;
}
elseif($col=='dregistrar'){
	header("location:libDRegistrar.php");
	ob_end_flush();
	exit;
}
elseif($col=='librarian'){
	header("location:libLibrarian.php");
	ob_end_flush();
	exit;
}