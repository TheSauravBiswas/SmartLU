<?php
ob_start();
session_start();
if(!isset($_SESSION['logger'])){
	echo '<script>alert("You have to login first.")</script>';
	header('location:login.php');
}elseif($_SESSION['logger']['status']!="Student"){
	echo "<script>alert('You do not have access to this page.')</script>";
	header('location:index.php');
}

include "config.php";

$sid = $_SESSION['logger']['uid'];
$semester = $_POST['semester'];

$doc = $_FILES['doc'];

if(empty($_FILES['doc']['name'])){
    header("location:tuitionFees.php?docerr=* submit an application");
    ob_end_flush();
    exit;
}elseif(isset($_FILES['doc']) && $_FILES['doc']['error'] === UPLOAD_ERR_OK){
    $fileType = $_FILES['doc']['type'];
    $fileSize = $_FILES['doc']['size'];

    $allowed = array("application/pdf");
    $maxFileSize = 1048576;
    if(!in_array($fileType, $allowed)) {
        header("location:tuitionFees.php?docerr=* Only pdf file is allowed.");
        ob_end_flush();
        exit;
    }
    elseif($fileSize > $maxFileSize){
        header("location:tuitionFees.php?docerr=* maximum file size 1MB");
        ob_end_flush();
        exit;
    }
    else{
        $docp = "files/seventy/".$sid.$semester.'.'.pathinfo($_FILES["doc"]['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["doc"]["tmp_name"], $docp);

        $sql = "UPDATE tuitionfees SET docp='$docp', hstatus='Pending', registrar='Pending' WHERE sid='$sid' AND semester='$semester'";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("location:tuitionFees.php");
            ob_end_flush();
            exit;
        }else{
            header("location:tuitionFees.php?docerr=* We couldn't receive your application, please submit again.");
            ob_end_flush();
            exit;
        }
    }
}