<?php
ob_start();
session_start();
if(!isset($_SESSION['logger'])){
	echo '<script>alert("You have to login first.")</script>';
	header('location:login.php');
}
@include 'config.php';

$name = $_SESSION['logger']['name'];
$dept = $_SESSION['logger']['dept'];
$batch = $_SESSION['logger']['batch'];
$program = $_SESSION['logger']['program'];
$lupayid = $_POST['lupayid'];
$otp = $_POST['otp'];
$pin = $_POST['pin'];
$id = $_POST['id'];
$fees = $_POST['fees'];
$page = $_POST['page'];
if($fees==4500){
    $emergency = "Yes";
}else{
    $emergency = "No";
}
$error=$newbalance=$resultsql=$resultsql2=$sql=$sql2=$row="";

$select = " SELECT * FROM lupay WHERE email = '$lupayid' AND pin ='$pin' ";
$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_array($result);

    if($row['balance']>=$fees){
        $newbalance = $row['balance'] - $fees;
        $sql = "UPDATE lupay SET balance='$newbalance' WHERE email='$lupayid' ";
        $resultsql = mysqli_query($conn, $sql);

        $sql2 = "INSERT INTO certificate(sid, name, dept, program, prov, orig, emergency, fees, dregistrar, acontroller, librarian, hstatus, dfa, cstatus) 
        VALUES('$id', '$name', '$dept', '$program', 'Applied', 'Not applied','$emergency', '$fees', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending')";
        $resultsql2 = mysqli_query($conn, $sql2);

        header("location:provStatus.php");
        ob_end_flush();
        exit;
    }
    else{
        header("location:certificate.php?error=Payment was unsuccessful! Insufficient balance.");
        ob_end_flush();
        exit;
    }
}
else{
    header("location:PIN.php?error=* incorrect PIN&lupayid=".$lupayid."&otp=".$otp."&fees=".$fees."&id=".$id."&page=".$page);
    ob_end_flush();
    exit;
}