<?php
ob_start();
session_start();
if(!isset($_SESSION['logger'])){
	echo '<script>alert("You have to login first.")</script>';
	header('location:login.php');
}

include "config.php";

$email = $id = NULL;

if(empty($_POST["assigned"])){
    header("location:assignSupple.php?error=* teacher name is required!");
    ob_end_flush();
    exit;
}
else{
    $email = $_POST['assigned'];
    $id = $_POST['id'];

    $sql = "SELECT * FROM login WHERE email = '$email'";
    $row = mysqli_fetch_array(mysqli_query($conn, $sql));

    $name = $row['name'];

    $sql2 = "SELECT * FROM supplement WHERE id = '$id'";
    $row2 = mysqli_fetch_array(mysqli_query($conn, $sql2));

    require("class.phpmailer.php");

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.zoho.com";
    $mail->SMTPSecure = 'ssl';
    $mail->Port = '465';
    $mail->Username ="sbis177@zohomail.com";
    $mail->Password ="Monster!8";

    $mail->From = "sbis177@zohomail.com";
    $mail->FromName = "Leading University, Sylhet";
    $mail->AddAddress($email, $row['name']);
    $mail->IsHTML(true);

    $mail->Subject = "Supplementary Examinations";
    $mail->Body    = "Dear ".$row['name'].","."<br>". "You have been assigned as course teacher for supplementay applicant ". $row2['name'] . "." . "<br>ID: ".$row2['sid']."<br><br>". "-Leading University, Sylhet";

    $mail->Send();

    $select = "UPDATE supplement SET assigned = '$name' WHERE id='$id' ";
    $result = mysqli_query($conn, $select);

    header("location:assignSupple.php");
    ob_end_flush();
    exit;
}