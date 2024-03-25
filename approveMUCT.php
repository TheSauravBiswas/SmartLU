<?php
ob_start();
session_start();
if(!isset($_SESSION['logger'])){
	echo '<script>alert("You have to login first.")</script>';
	header('location:login.php');
}

include "config.php";

$date = $id = $time = $select = $result = NULL;

if(empty($_POST["date"])){
    header("location:makeupCT.php?dateerror=Date is required before approving!");
    ob_end_flush();
    exit;
}
elseif($_POST["time"]=="Choose...") {
    header("location:makeupCT.php?timeerror=Time is required before approving!");
    ob_end_flush();
    exit;
}
else{
    $date = $_POST['date'];
    $id = $_POST['id'];
    $time = $_POST['time'];

    $select = "UPDATE makeup SET ctstatus = 'Approved', date = '$date', time = '$time' WHERE id='$id' ";
    $result = mysqli_query($conn, $select);

    header("location:makeupCT.php");
    ob_end_flush();
    exit;
}