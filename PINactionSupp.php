<?php
ob_start();
session_start();
if(!isset($_SESSION['logger'])){
	echo '<script>alert("You have to login first.")</script>';
	header('location:login.php');
}
@include 'config.php';

$lupayid = $_POST['lupayid'];
$otp = $_POST['otp'];
$pin = $_POST['pin'];
$id = $_POST['id'];
$fees = $_POST['fees'];
$page = $_POST['page'];
$error=$newbalance=$resultsql=$resultsql2=$sql=$sql2=$row="";

$select = " SELECT * FROM lupay WHERE email = '$lupayid' AND pin ='$pin' ";
$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_array($result);

    if($row['balance']>=$fees){
        $newbalance = $row['balance'] - $fees;
        $sql = "UPDATE lupay SET balance='$newbalance' WHERE email='$lupayid' ";
        $resultsql = mysqli_query($conn, $sql);

        $sql2 = "UPDATE supplement SET fees='$fees' WHERE id='$id' ";
        $resultsql2 = mysqli_query($conn, $sql2);

        header("location:suppleStatus.php?success=Payment successful! You can download admit card now.");
        ob_end_flush();
        exit;
    }
    else{
        header("location:suppleStatus.php?error=Payment unsuccessful! Insufficient balance.");
        ob_end_flush();
        exit;
    }
}
else{
    header("location:PIN.php?error=* incorrect PIN&lupayid=".$lupayid."&otp=".$otp."&fees=".$fees."&id=".$id."&page=".$page);
    ob_end_flush();
    exit;
}