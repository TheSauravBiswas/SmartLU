<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LU | Graduate Admission</title>
    <link rel="icon" type="image/x-icon" href="logo-white.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    
    <script src="jquery-slim.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');

        body{
            background: #333;
            font-family: 'Ubuntu', sans-serif;
        }

        .navbar{
            background: #222;
        }

        .label{
            float: right;
        }

        .container h1, h2{
            color: #fff;
            text-align: center;
        }


        .admissionform{
            background: #fff;
            padding: 20px;
            border-radius: 10px;
        }
        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }
        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
</head>

<body>
<?php
include 'config.php';

$program = $name = $fname = $mname = $permanent = $present = $number = $email = $gnumber = $dob = $gender = 
$blood = $reg = $sscyear = $sscboard = $sscins = $sscgroup = $sscroll = $sscgpa = $hscyear = $hscboard = $hscins = 
$hscgroup = $hscroll = $hscgpa = $waiver = $waiverimg = $dp = $gdp = $ssctrans = $hsctrans = $testimonial = 
$gidcard = $bc = $wd = $ap = $gp = $st = $ht = $tm = $gid = $sbc = $password = $gradyear = $gradins = $gradsub = $gradroll = $gradgpa = $gradtrans="";

$programErr = $nameErr = $fnameErr = $mnameErr = $permanentErr = $presentErr = $numberErr = $emailErr = $gnumberErr = 
$dobErr = $genderErr = $regErr = $sscyearErr = $sscboardErr = $sscinsErr = $sscgroupErr = $sscrollErr = $sscgpaErr = 
$hscyearErr = $hscboardErr = $hscinsErr = $hscgroupErr = $hscrollErr = $hscgpaErr = $waiverErr = $waiverimgErr = $dpErr = $gdpErr = 
$ssctransErr = $hsctransErr = $testimonialErr = $gidcardErr = $bcErr = $selectreg=$resultsreg=$dbErr= $gradyearErr = $gradinsErr = $gradsubErr = $gradrollErr = $gradgpaErr=$gradtransErr= "";

$fileType=$fileSize=$allowed=$maxFileSize=$tempFilePath=$width=$height=$rWidth=$rHeight="";
$f1=$f2=$f3=$f4=$f5=$f6=$f7=$f8=$f9=NULL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_FILES['waiverimg']) && $_FILES['waiverimg']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['waiverimg']['type'];
        $fileSize = $_FILES['waiverimg']['size'];

        $allowed = array("application/pdf");
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $f1 = "* Only pdf file is allowed.";
        }
        elseif($fileSize > $maxFileSize){
            $f1 = "* maximum file size 1MB";
        }
        else{
            $wd = "files/WD_".$reg.'.'.pathinfo($_FILES["waiverimg"]['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["waiverimg"]["tmp_name"], $wd);
        }
    }
    if(isset($_FILES['dp']) && $_FILES['dp']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['dp']['type'];
        $tempFilePath = $_FILES['dp']['tmp_name'];
        $fileSize = $_FILES['dp']['size'];

        $allowed = array("image/jpeg", "image/jpg");
        list($width, $height) = getimagesize($tempFilePath);
        $rWidth=300;
        $rHeight=300;
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $f2 = "* Only jpg and jpeg are allowed.";
        }
        elseif($width !== $rWidth && $height !== $rHeight){
            $f2="* photo resolution must be 300x300 pixels";
        }
        elseif($fileSize > $maxFileSize){
            $f2 = "* maximum file size 1MB";
        }
    }
    if(isset($_FILES['gdp']) && $_FILES['gdp']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['gdp']['type'];
        $tempFilePath = $_FILES['gdp']['tmp_name'];
        $fileSize = $_FILES['gdp']['size'];

        $allowed = array("image/jpeg", "image/jpg");
        list($width, $height) = getimagesize($tempFilePath);
        $rWidth=300;
        $rHeight=300;
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $f3 = "* Only jpg and jpeg are allowed.";
        }
        elseif($width !== $rWidth && $height !== $rHeight){
            $f3="* photo resolution must be 300x300 pixels";
        }
        elseif($fileSize > $maxFileSize){
            $f3 = "* maximum file size 1MB";
        }
    }
    if(isset($_FILES['ssctrans']) && $_FILES['ssctrans']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['ssctrans']['type'];
        $fileSize = $_FILES['ssctrans']['size'];

        $allowed = array("application/pdf");
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $f4 = "* Only pdf file is allowed.";
        }
        elseif($fileSize > $maxFileSize){
            $f4 = "* maximum file size 1MB";
        }
    }
    if(isset($_FILES['hsctrans']) && $_FILES['hsctrans']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['hsctrans']['type'];
        $fileSize = $_FILES['hsctrans']['size'];

        $allowed = array("application/pdf");
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $f5 = "* Only pdf file is allowed.";
        }
        elseif($fileSize > $maxFileSize){
            $f5 = "* maximum file size 1MB";
        }
    }
    if(isset($_FILES['gradtrans']) && $_FILES['gradtrans']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['gradtrans']['type'];
        $fileSize = $_FILES['gradtrans']['size'];

        $allowed = array("application/pdf");
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $f9 = "* Only pdf file is allowed.";
        }
        elseif($fileSize > $maxFileSize){
            $f9 = "* maximum file size 1MB";
        }
    }
    if(isset($_FILES['testimonial']) && $_FILES['testimonial']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['testimonial']['type'];
        $fileSize = $_FILES['testimonial']['size'];

        $allowed = array("application/pdf");
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $f6 = "* Only pdf file is allowed.";
        }
        elseif($fileSize > $maxFileSize){
            $f6 = "* maximum file size 1MB";
        }
    }
    if(isset($_FILES['gidcard']) && $_FILES['gidcard']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['gidcard']['type'];
        $fileSize = $_FILES['gidcard']['size'];

        $allowed = array("application/pdf");
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $f7 = "* Only pdf file is allowed.";
        }
        elseif($fileSize > $maxFileSize){
            $f7 = "* maximum file size 1MB";
        }
    }
    if(isset($_FILES['bc']) && $_FILES['bc']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['bc']['type'];
        $fileSize = $_FILES['bc']['size'];

        $allowed = array("application/pdf");
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $f8 = "* Only pdf file is allowed.";
        }
        elseif($fileSize > $maxFileSize){
            $f8 = "* maximum file size 1MB";
        }
    }


    $reg = $_POST['reg'];
    $selectreg = " SELECT * FROM undergrad WHERE reg = '$reg' ";
    $resultsreg = mysqli_query($conn, $selectreg);

    if(mysqli_num_rows($resultsreg) > 0){
        $regErr="* already applied";
    }
    elseif ($_POST["program"]=="Choose...") {
        $programErr = "* name of the program is required";
    }
    elseif(empty($_POST["name"])){
        $nameErr="* name is required";
    }elseif(strlen($_POST["name"]) > 30) {
        $nameErr="* maximum 30 characters";
    }elseif(!preg_match("/^[a-zA-Z.\-:\s]+$/", $_POST["name"])){
        $nameErr="* invalid name format";
    }
    elseif(empty($_POST["fname"])){
        $fnameErr="* father's name is required";
    }elseif(strlen($_POST["fname"]) > 30) {
        $fnameErr="* maximum 30 characters";
    }elseif(!preg_match("/^[a-zA-Z.\-:\s]+$/", $_POST["fname"])){
        $fnameErr="* invalid name format";
    }
    elseif(empty($_POST["mname"])){
        $mnameErr="* mother's name is required";
    }elseif(strlen($_POST["mname"]) > 30) {
        $mnameErr="* maximum 30 characters";
    }elseif(!preg_match("/^[a-zA-Z.\-:\s]+$/", $_POST["mname"])){
        $mnameErr="* invalid name format";
    }
    elseif(empty($_POST["permanent"])){
        $permanentErr="* permanent address is required";
    }elseif(strlen($_POST["permanent"]) > 100) {
        $permanentErr="* maximum 100 characters";
    }elseif(!preg_match("/^[a-zA-Z0-9\s\.,\-:\/]+$/", $_POST["permanent"])){
        $permanentErr="* invalid address format";
    }
    elseif(empty($_POST["present"])){
        $presentErr="* name is required";
    }elseif(strlen($_POST["present"]) > 100) {
        $presentErr="* maximum 100 characters";
    }elseif(!preg_match("/^[a-zA-Z0-9\s\.,\-:\/]+$/", $_POST["present"])){
        $presentErr="* invalid address format";
    }
    elseif(empty($_POST["number"])){
        $numberErr="* applicant's number is required";
    }elseif(!preg_match('/^01[3-9][0-9]{8}$/', $_POST["number"])){
        $numberErr="* invalid number format";
    }
    elseif(empty($_POST["email"])){
        $emailErr="* email is required";
    }elseif(strlen($_POST["email"]) > 50) {
        $emailErr="* maximum 50 digits";
    }elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $emailErr="* invalid email format";
    }
    elseif(empty($_POST["gnumber"])){
        $gnumberErr="* guardian's number is required";
    }elseif(strlen($_POST["gnumber"]) > 11) {
        $gnumberErr="* maximum 11 digits";
    }elseif(!preg_match("/^01[3-9][0-9]{8}$/", $_POST["gnumber"])){
        $gnumberErr="* invalid number format";
    }
    elseif(empty($_POST["dob"])){
        $dobErr="* date of birth is required";
    }
    elseif($_POST["gender"]=="Choose...") {
        $genderErr = "* gender is required";
    }
    elseif(empty($_POST["reg"])){
        $regErr="* registraion no. is required";
    }elseif(strlen($_POST["reg"]) > 10) {
        $regErr="* maximum 10 digits";
    }elseif(!preg_match("/^[0-9]{10}$/", $_POST["reg"])){
        $regErr="* invalid registration no. format";
    }
    /*/ssc*/
    elseif(empty($_POST["sscyear"])){
        $sscyearErr="* SSC year is required";
    }elseif(!preg_match("/^20\d{2}$/", $_POST["sscyear"])){
        $sscyearErr="* invalid year";
    }
    elseif($_POST["sscboard"]=="Choose Board...") {
        $sscboardErr = "* SSC board name is required";
    }
    elseif(empty($_POST["sscins"])){
        $sscinsErr="* SSC institution is required";
    }elseif(strlen($_POST["sscins"]) > 100) {
        $sscinsErr="* maximum 100 digits";
    }elseif(!preg_match("/^[a-zA-Z.,\-:\s]+$/", $_POST["sscins"])){
        $sscinsErr="* invalid name format";
    }
    elseif($_POST["sscgroup"]=="Choose Group...") {
        $sscgroupErr = "* SSC group is required";
    }
    elseif(empty($_POST["sscroll"])){
        $sscrollErr="* SSC roll is required";
    }elseif(strlen($_POST["sscroll"]) > 6) {
        $sscrollErr="* maximum 6 digits";
    }elseif(!preg_match("/^[0-9]{6}$/", $_POST["sscroll"])){
        $sscrollErr="* invalid roll format";
    }
    elseif(empty($_POST["sscgpa"])){
        $sscgpaErr="* SSC GPA is required";
    }elseif(!preg_match("/^[1-5]\.\d{2}$/", $_POST["sscgpa"])){
        $sscgpaErr="* Invalid GPA format. Example: 5.00";
    }
    //hsc
    elseif(empty($_POST["hscyear"])){
        $hscyearErr="* HSC year is required";
    }elseif(!preg_match("/^20\d{2}$/", $_POST["hscyear"])){
        $hscyearErr="* invalid year";
    }
    elseif($_POST["hscboard"]=="Choose Board...") {
        $hscboardErr = "* HSC board name is required";
    }
    elseif(empty($_POST["hscins"])){
        $hscinsErr="* HSC institution is required";
    }elseif(strlen($_POST["hscins"]) > 100) {
        $hscinsErr="* maximum 100 digits";
    }elseif(!preg_match("/^[a-zA-Z.,\-:\s]+$/", $_POST["hscins"])){
        $hscinsErr="* invalid name format";
    }
    elseif($_POST["hscgroup"]=="Choose Group...") {
        $hscgroupErr = "* HSC group is required";
    }
    elseif(empty($_POST["hscroll"])){
        $hscrollErr="* HSC roll is required";
    }elseif(strlen($_POST["hscroll"]) > 6) {
        $hscrollErr="* maximum 6 digits";
    }elseif(!preg_match("/^[0-9]{6}$/", $_POST["hscroll"])){
        $hscrollErr="* invalid roll format";
    }
    elseif(empty($_POST["hscgpa"])){
        $hscgpaErr="* HSC GPA is required";
    }elseif(!preg_match("/^[1-5]\.\d{2}$/", $_POST["hscgpa"])){
        $hscgpaErr="* Invalid GPA format. Example: 5.00";
    }
    //grad
    elseif(empty($_POST["gradyear"])){
        $gradyearErr="* grad year is required";
    }elseif(!preg_match("/^20\d{2}$/", $_POST["gradyear"])){
        $gradyearErr="* invalid year";
    }
    elseif(empty($_POST["gradins"])){
        $gradinsErr="* grad institution is required";
    }elseif(strlen($_POST["gradins"]) > 100) {
        $gradinsErr="* maximum 100 digits";
    }elseif(!preg_match("/^[a-zA-Z.,\-:\s]+$/", $_POST["gradins"])){
        $gradinsErr="* invalid name format";
    }
    elseif($_POST["gradsub"]=="Choose Group...") {
        $gradsubErr = "* grad group is required";
    }
    elseif(empty($_POST["gradroll"])){
        $gradrollErr="* grad roll is required";
    }elseif(strlen($_POST["gradroll"]) > 6) {
        $gradrollErr="* maximum 6 digits";
    }elseif(!preg_match("/^[0-9]{6}$/", $_POST["gradroll"])){
        $gradrollErr="* invalid roll format";
    }
    elseif(empty($_POST["gradgpa"])){
        $gradgpaErr="* grad GPA is required";
    }elseif(!preg_match("/^[1-5]\.\d{2}$/", $_POST["gradgpa"])){
        $gradgpaErr="* Invalid GPA format. Example: 5.00";
    }
    //files
        elseif($_POST["waiver"]=="Choose..."){
            $waiverErr="* select a special waiver";
        }
        elseif($f1){
            $waiverimgErr = $f1;
        }
    elseif(empty($_FILES["dp"]['name'])){
        $dpErr="* Applicant's photo is required.";
    }elseif($f2){
        $dpErr = $f2;
    }
    elseif(empty($_FILES["gdp"]['name'])){
        $gdpErr="* Guardian's photo is required.";
    }elseif($f3){
        $gdpErr = $f3;
    }
    elseif(empty($_FILES["ssctrans"]['name'])){
        $ssctransErr="* transcript of SSC is required";
    }elseif($f4){
        $ssctransErr = $f4;
    }
    elseif(empty($_FILES["hsctrans"]['name'])){
        $hsctransErr="* transcript of HSC is required";
    }elseif($f5){
        $hsctransErr=$f5;
    }
    
    elseif(empty($_FILES["gradtrans"]['name'])){
        $gradtransErr="* transcript of HSC is required";
    }elseif($f9){
        $gradtransErr=$f9;
    }
    elseif(empty($_FILES["testimonial"]['name'])){
        $testimonialErr="* testimonial is required";
    }elseif($f6){
        $testimonialErr=$f6;
    }
    elseif(empty($_FILES["gidcard"]['name'])){
        $gidcardErr="* Guardian's ID card is required";
    }elseif($f7){
        $gidcardErr=$f7;
    }
    elseif(empty($_FILES["bc"]['name'])){
        $bcErr="* Student's Birth Certificate is required";
    }elseif($f8){
        $bcErr=$f8;
    }
    else{
        $program = $_POST['program'];
        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $permanent = $_POST['permanent'];
        $present = $_POST['present'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $gnumber = $_POST['gnumber'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $blood = $_POST['blood'];
        $sscyear = $_POST['sscyear'];
        $sscboard = $_POST['sscboard'];
        $sscins = $_POST['sscins'];
        $sscgroup = $_POST['sscgroup'];
        $sscroll = $_POST['sscroll'];
        $sscgpa = $_POST['sscgpa'];
        $hscyear = $_POST['hscyear'];
        $hscboard = $_POST['hscboard'];
        $hscins = $_POST['hscins'];
        $hscgroup = $_POST['hscgroup'];
        $hscroll = $_POST['hscroll'];
        $hscgpa = $_POST['hscgpa'];

        $gradyear = $_POST['gradyear'];
        $gradins = $_POST['gradins'];
        $gradsub = $_POST['gradsub'];
        $gradroll = $_POST['gradroll'];
        $gradgpa = $_POST['gradgpa'];

        $dp = $_FILES['dp'];
        $gdp = $_FILES['gdp'];
        $ssctrans = $_FILES['ssctrans'];
        $hsctrans = $_FILES['hsctrans'];
        $gradtrans = $_FILES['gradtrans'];
        $testimonial = $_FILES['testimonial'];
        $gidcard = $_FILES['gidcard'];
        $bc = $_FILES['bc'];
        if(isset($_POST["waiver"])){$waiver = $_POST["waiver"];}
        if(isset($_FILES["waiverimg"])){$waiverimg = $_FILES["waiverimg"];}
        $password = substr(str_shuffle("1234567890"), 0, 5);

        $ap = "files/AP_".$reg.'.'.pathinfo($_FILES["dp"]['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["dp"]["tmp_name"], $ap);
        $gp = "files/GP_".$reg.'.'.pathinfo($_FILES["gdp"]['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["gdp"]["tmp_name"], $gp);
        $st = "files/ST_".$reg.'.'.pathinfo($_FILES["ssctrans"]['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["ssctrans"]["tmp_name"], $st);
        $ht = "files/HT_".$reg.'.'.pathinfo($_FILES["hsctrans"]['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["hsctrans"]["tmp_name"], $ht);
        $gt = "files/HT_".$reg.'.'.pathinfo($_FILES["gradtrans"]['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["gradtrans"]["tmp_name"], $ht);
        $tm = "files/TM_".$reg.'.'.pathinfo($_FILES["testimonial"]['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["testimonial"]["tmp_name"], $tm);
        $gid = "files/GID_".$reg.'.'.pathinfo($_FILES["gidcard"]['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["gidcard"]["tmp_name"], $gid);
        $sbc = "files/BC_".$reg.'.'.pathinfo($_FILES["bc"]['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["bc"]["tmp_name"], $sbc);

        $sql = "INSERT INTO undergrad(program, name, fname, mname, permanent, present, number, 
        email, gnumber, dob, gender, blood, reg, sscyear, sscboard, sscins, sscgroup, sscroll, sscgpa, 
        hscyear, hscboard, hscins, hscgroup, hscroll, hscgpa, quota, quotadoc, waiver, ap, gp, ssctrans, hsctrans, 
        testimonial, gidcard, bc, password, admission, fees, status, gradyear, gradins, gradsub, gradroll, gradgpa, gradtrans) 
        VALUES('$program', '$name', '$fname', '$mname', '$permanent', '$present', '$number', '$email', '$gnumber', '$dob', 
        '$gender', '$blood', '$reg', '$sscyear', '$sscboard', '$sscins', '$sscgroup', '$sscroll', '$sscgpa', '$hscyear', 
        '$hscboard', '$hscins', '$hscgroup', '$hscroll', '$hscgpa', '$waiver', '$wd', 'Pending', '$ap', '$gp', '$st', '$ht', 
        '$tm', '$gid', '$sbc', '$password', 'Pending', '0', 'gradapplicant', '$gradyear', '$gradins', '$gradsub', '$gradroll', '$gradgpa', '$gt')";
        
        $result = mysqli_query($conn, $sql);

        if($result){

            require("class.phpmailer.php");

            $mail = new PHPMailer();

            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = ""; //Host Name of Sender's Email
            $mail->SMTPSecure = ''; //Secure Connection Type of Sender's Email
            $mail->Port = ''; //SMTP Port of Sender's Email
            $mail->Username =""; //Sender's Email Address
            $mail->Password =""; //Password of Sender's Email
        
            $mail->From = ""; //Sender's Email Address
            $mail->FromName = "Leading University, Sylhet";
            $mail->AddAddress($email, $name);
            $mail->IsHTML(true);

            $mail->Subject = "Application Received.";
            $mail->Body    = "Dear ".$name.","."<br>". "We have received your application for admission in graduate 
            program of ". $program . "." . "<br>". "To view applicaiton form or to check application status, use your Registration number 
            and password given below.". "<br><br>". "Your Registration number: ".$reg. "<br>". "Password: ".$password. 
            "<br><br>". "-Leading University, Sylhet";

            $mail->Send();

            header("location:preStatusGrad.php?success=We have received your application!");
            exit;
        }
        else{
            $dbErr="* We couldn't receive your application, please submit again.";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="navbar-brand" href="#">
        <div><img src="logo-white.png" alt="LU logo" height="40">
        <div class="label"><img src="label-white.png" alt="LU name" height="40"></div></div>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <!--li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li-->
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" hidden>
        <!--button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button-->
        </form>
        <a href="login.php"><button class="btn btn-outline-success my-2 my-sm-0">Login</button></a>
    </div>
    </nav>

    <div class="container">
    <h2 style="padding-top: 85px;">Graduate Admission Form</h2>
        <?php if ($dbErr) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $dbErr;?>
            </div>
        <?php } ?>
        <form class="admissionform my-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method ="post" enctype='multipart/form-data'>
        <?php if(isset($_SESSION['logger'])){ ?>
            <a class="mb-4" href="gradStatus.php"><b>Already applied? Click here to view applicaiton status.</b></a>
        <?php }else{ ?>
            <a class="mb-4" href="gStatusLogin.php"><b>Already applied? Click here to view applicaiton status.</b></a>
        <?php } ?>
            <div class="form-group">
                <label for="">Name of the Program</label>
                <select id="" class="form-select" aria-label="Default select example" name="program">
                    <option selected>Choose...</option>
                    <option>Master of Business Administration</option>
                    <option>Executive Master of Business Administration</option>
                    <option>MA in English</option>
                    <option>Master of Laws</option>
                    <option>MA in Islamic Studies</option>
                    <option>Master of Public Health</option>
                    <option>M.Sc in Computer Science and Engineering</option>
                </select>
                <span class="text-danger"><?php echo $programErr;?></span>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                <span class="text-danger"><?php echo $nameErr;?></span>
            </div>

            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="fname">Father's Name</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?= isset($_POST['fname']) ? $_POST['fname'] : ''; ?>">
                <span class="text-danger"><?php echo $fnameErr;?></span>
            </div>
            <div class="form-group col-md-6">
                <label for="mname">Mother's Name</label>
                <input type="text" class="form-control" id="mname" name="mname" value="<?= isset($_POST['mname']) ? $_POST['mname'] : ''; ?>">
                <span class="text-danger"><?php echo $mnameErr;?></span>
            </div>
            </div>

            <div class="form-group">
                <label for="">Permanent Address</label>
                <input type="text" class="form-control" id="" name="permanent" placeholder="Village, Union, District etc." value="<?= isset($_POST['permanent']) ? $_POST['permanent'] : ''; ?>">
                <span class="text-danger"><?php echo $permanentErr;?></span>
            </div>
            <div class="form-group">
                <label for="">Present Address</label>
                <input type="text" class="form-control" id="" name="present" placeholder="House no., Street, City etc." value="<?= isset($_POST['present']) ? $_POST['present'] : ''; ?>">
                <span class="text-danger"><?php echo $presentErr;?></span>
            </div>

            <div class="form-row">
            <div class="form-group col-md-4">
                <label for="number">Applicant's Mobile</label>
                <input type="tel" class="form-control" id="number" name="number" placeholder="01812345678" value="<?= isset($_POST['number']) ? $_POST['number'] : ''; ?>">
                <span class="text-danger"><?php echo $numberErr;?></span>
            </div>
            <div class="form-group col-md-4">
                <label for="email">Applicant's Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                <span class="text-danger"><?php echo $emailErr;?></span>
            </div>
            <div class="form-group col-md-4">
                <label for="gnumber">Guardian's Mobile</label>
                <input type="tel" class="form-control" id="gnumber" name="gnumber" placeholder="01812345678" value="<?= isset($_POST['gnumber']) ? $_POST['gnumber'] : ''; ?>">
                <span class="text-danger"><?php echo $gnumberErr;?></span>
            </div>
            </div>

            <div class="form-row">
            <div class="form-group col-md-4">
                <label for="">Date of Birth</label>
                <input type="date" class="form-control" id="" name="dob" value="<?= isset($_POST['dob']) ? $_POST['dob'] : ''; ?>">
                <span class="text-danger"><?php echo $dobErr;?></span>
            </div>
            <div class="form-group col-md-4">
                <label for="">Gender</label>
                <select id="" class="form-select" name="gender">
                    <option selected>Choose...</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Others</option>
                </select>
                <span class="text-danger"><?php echo $genderErr;?></span>
            </div>
            <div class="form-group col-md-4">
                <label for="">Blood Group <span class="text-muted">(Optional)</span></label>
                <select id="" class="form-select" name="blood">
                    <option>-</option>
                    <option>A+</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>O+</option>
                    <option>O-</option>
                    <option>AB+</option>
                    <option>AB-</option>
                </select>
            </div>
            </div>

            <div class="form-group">
                <label for="">Registration no. of HSC</label>
                <input type="text" class="form-control" id="" name="reg" value="<?= isset($_POST['reg']) ? $_POST['reg'] : ''; ?>">
                <span class="text-danger"><?php echo $regErr;?></span>
            </div>

            SSC

            <div class="form-row">
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="" name="sscyear" placeholder="Year" value="<?= isset($_POST['sscyear']) ? $_POST['sscyear'] : ''; ?>">
                <span class="text-danger"><?php echo $sscyearErr;?></span>
            </div>
            <div class="form-group col-md-2">
                <select id="" class="form-select" name="sscboard">
                    <option>Choose Board...</option>
                    <option>Barisal</option>
                    <option>Chittagong</option>
                    <option>Comilla</option>
                    <option>Dhaka</option>
                    <option>Dinajpur</option>
                    <option>Jessore</option>
                    <option>Rajshahi</option>
                    <option>Sylhet</option>
                    <option>Technical</option>
                    <option>Madrasah</option>
                    <option>DIBS(Dhaka)</option>
                </select>
                <span class="text-danger"><?php echo $sscboardErr;?></span>
            </div>
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="" name="sscins" placeholder="Institution" value="<?= isset($_POST['sscins']) ? $_POST['sscins'] : ''; ?>">
                <span class="text-danger"><?php echo $sscinsErr;?></span>
            </div>
            <div class="form-group col-md-2">
                <select id="" class="form-select" name="sscgroup">
                    <option>Choose Group...</option>
                    <option>Science</option>
                    <option>Commerce</option>
                    <option>Arts</option>
                </select>
                <span class="text-danger"><?php echo $sscgroupErr;?></span>
            </div>
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="" name="sscroll" placeholder="Roll" value="<?= isset($_POST['sscroll']) ? $_POST['sscroll'] : ''; ?>">
                <span class="text-danger"><?php echo $sscrollErr;?></span>
            </div>
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="" name="sscgpa" placeholder="GPA" value="<?= isset($_POST['sscgpa']) ? $_POST['sscgpa'] : ''; ?>">
                <span class="text-danger"><?php echo $sscgpaErr;?></span>
            </div>
            </div>

            HSC

            <div class="form-row">
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="" name="hscyear" placeholder="Year" value="<?= isset($_POST['hscyear']) ? $_POST['hscyear'] : ''; ?>">
                <span class="text-danger"><?php echo $hscyearErr;?></span>
            </div>
            <div class="form-group col-md-2">
                <select id="" class="form-select" name="hscboard">
                    <option>Choose Board...</option>
                    <option>Barisal</option>
                    <option>Chittagong</option>
                    <option>Comilla</option>
                    <option>Dhaka</option>
                    <option>Dinajpur</option>
                    <option>Jessore</option>
                    <option>Rajshahi</option>
                    <option>Sylhet</option>
                    <option>Technical</option>
                    <option>Madrasah</option>
                    <option>DIBS(Dhaka)</option>
                </select>
                <span class="text-danger"><?php echo $hscboardErr;?></span>
            </div>
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="" name="hscins" placeholder="Institution" value="<?= isset($_POST['hscins']) ? $_POST['hscins'] : ''; ?>">
                <span class="text-danger"><?php echo $hscinsErr;?></span>
            </div>
            <div class="form-group col-md-2">
                <select id="" class="form-select" name="hscgroup">
                <option>Choose Group...</option>
                    <option>Science</option>
                    <option>Commerce</option>
                    <option>Arts</option>
                </select>
                <span class="text-danger"><?php echo $hscgroupErr;?></span>
            </div>
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="" name="hscroll" placeholder="Roll" value="<?= isset($_POST['hscroll']) ? $_POST['hscroll'] : ''; ?>">
                <span class="text-danger"><?php echo $hscrollErr;?></span>
            </div>
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="" name="hscgpa" placeholder="GPA" value="<?= isset($_POST['hscgpa']) ? $_POST['hscgpa'] : ''; ?>">
                <span class="text-danger"><?php echo $hscgpaErr;?></span>
            </div>
            </div>

            Honours

            <div class="form-row">
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="" name="gradyear" placeholder="Year" value="<?= isset($_POST['gradyear']) ? $_POST['gradyear'] : ''; ?>">
                <span class="text-danger"><?php echo $gradyearErr;?></span>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" id="" name="gradins" placeholder="Institution" value="<?= isset($_POST['gradins']) ? $_POST['gradins'] : ''; ?>">
                <span class="text-danger"><?php echo $gradinsErr;?></span>
            </div>
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="" name="gradsub" placeholder="Subject" value="<?= isset($_POST['gradsub']) ? $_POST['gradsub'] : ''; ?>">
                <span class="text-danger"><?php echo $gradrollErr;?></span>
            </div>
            <div class="form-group col-md-3">
            <input type="text" class="form-control" id="" name="gradroll" placeholder="Roll" value="<?= isset($_POST['gradroll']) ? $_POST['gradroll'] : ''; ?>">
                <span class="text-danger"><?php echo $gradsubErr;?></span>
            </div>
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="" name="gradgpa" placeholder="CGPA" value="<?= isset($_POST['gradgpa']) ? $_POST['gradgpa'] : ''; ?>">
                <span class="text-danger"><?php echo $gradgpaErr;?></span>
            </div>
            </div>

            <div class="form-row">
            <div class="form-group col-md-6">
            <label for="">Special Waiver</label>
            <select id="" class="form-select waiverfield" name="waiver">
                    <option selected>Choose...</option>
                    <option>None</option>
                    <option>Freedom Fighter's Son/Daughter (100%)</option>
                    <option>Other Children of Same Parents (Provisional) (30%)</option>
                    <option>Teacher's Children (10%)</option>
                    <option>Tribal (10%)</option>
                    <option>Physically Disabled (10%)</option>
            </select>
            <span class="text-danger"><?php echo $waiverErr;?></span>
            </div>
            <div class="form-group col-md-6">
                <label for="">Scan Copy of Original Document(s) Justifying the Special Waiver</label>
                <input  class="form-control waiverfield" type="file" id="waive" name="waiverimg" >
                <span class="text-danger"><?php echo $waiverimgErr;?></span>
            </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Applicant's Photo</label>
                    <input type="file" class="form-control" id="ap" name="dp">
                    <span class="text-danger"><?php echo $dpErr;?></span>
                    <img class="mt-2" width="150px" src="" alt="" id="appreview">
                </div>
                <script>
                    ap.onchange = evt => {
                        const [file] = ap.files
                        if (file) {
                            appreview.src = URL.createObjectURL(file)
                        }
                    }
                </script>
                <div class="form-group col-md-6">
                    <label for="">Guardian's Photo</label>
                    <input type="file" class="form-control" id="gdp" name="gdp">
                    <span class="text-danger"><?php echo $gdpErr;?></span>
                    <img class="mt-2" width="150px" src="" alt="" id="gdppreview">
                </div>
                <script>
                    gdp.onchange = evt => {
                        const [file] = gdp.files
                        if (file) {
                            gdppreview.src = URL.createObjectURL(file)
                        }
                    }
                </script>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="">Transcript of SSC</label>
                    <input type="file" class="form-control" id="ssctrans" name="ssctrans">
                    <span class="text-danger"><?php echo $ssctransErr;?></span>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Transcript of HSC</label>
                    <input type="file" class="form-control" id="hsctrans" name="hsctrans">
                    <span class="text-danger"><?php echo $hsctransErr;?></span>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Transcript of Honours</label>
                    <input type="file" class="form-control" id="gradtrans" name="gradtrans">
                    <span class="text-danger"><?php echo $gradtransErr;?></span>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Testimonial of Last Institution</label>
                    <input type="file" class="form-control" id="testimonial" name="testimonial">
                    <span class="text-danger"><?php echo $testimonialErr;?></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Guardian's ID Card</label>
                    <input type="file" class="form-control" id="gidcard" name="gidcard">
                    <span class="text-danger"><?php echo $gidcardErr;?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Applicant's Birth Certificate</label>
                    <input type="file" class="form-control" id="bc" name="bc">
                    <span class="text-danger"><?php echo $bcErr;?></span>
                </div>
            </div>

            <p><table class="text-danger font-weight-bold "><tr>
                <td class="align-top">[NB: </td>
                <td>1. Applicant's and Guardian's photo must be 300x300 and Colored.</td>
                </tr>
                <tr>
                    <td></td>
                    <td>2. Documents must be scan copy of original documents. No photocopy.]</td>
                </tr></table>
            </P>
            <button type="submit" class="btn btn-primary" name="ugradad">Submit</button>
        </form>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="bootstrap" viewBox="0 0 118 94">
                <title>Bootstrap</title>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
            </symbol>
            <symbol id="facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
            </symbol>
            <symbol id="instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
            </symbol>
            <symbol id="twitter" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
            </symbol>
        </svg>

        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <img class="bi" width="30" height="24" src="logo-white.png"></img>
            </a>
            <span class="mb-3 mb-md-0 text-light">&copy; 2024 Leading University, Sylhet</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-light" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
            <li class="ms-3"><a class="text-light" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
            <li class="ms-3"><a class="text-light" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
            </ul>
        </footer>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>
