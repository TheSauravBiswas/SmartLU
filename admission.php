<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LU | Undergraduate Admission</title>
    <link rel="icon" type="image/x-icon" href="logo-white.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    
    <script src="jquery-slim.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">

    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php

$programErr = $nameErr = $fnameErr = $mnameErr = $permanentErr = $presentErr = $numberErr = $emailErr = $gnumberErr = 
$dobErr = $genderErr = $regErr = $sscyearErr = $sscboardErr = $sscinsErr = $sscgroupErr = $sscrollErr = $sscgpaErr = 
$hscyearErr = $hscboardErr = $hscinsErr = $hscgroupErr = $hscrollErr = $hscgpaErr = $waiverErr = $waiverimgErr = $dpErr = $gdpErr = 
$ssctransErr = $hsctransErr = $testimonialErr = $gidcardErr = $bcErr = "";

$fileType=$fileSize=$allowed=$maxFileSize=$tempFilePath=$width=$height=$rWidth=$rHeight="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["program"]=="Choose...") {
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
    }elseif(!preg_match("/^[a-zA-Z.\-:\s]+$/", $_POST["present"])){
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
    //ssc
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
    elseif($_POST["checkwaiver"]){
        if($_POST["waiver"]=="Choose..."){
            $waiverErr="* select a special waiver";
        }
        elseif(empty($_FILES["waiverimg"]['name'])){
            $waiverimgErr="* provide justifying document(s)";
        }elseif(isset($_FILES['waiverimg']) && $_FILES['waiverimg']['error'] === UPLOAD_ERR_OK){
            $fileType = $_FILES['waiverimg']['type'];
            $fileSize = $_FILES['waiverimg']['size'];

            $allowed = array("image/jpeg", "image/jpg", "image/png", "application/pdf");
            $maxFileSize = 1048576;
            if(!in_array($fileType, $allowed)) {
                $waiverimgErr = "* Only jpg, jpeg, png and pdf files are allowed.";
            }
            elseif($fileSize > $maxFileSize){
                $waiverimgErr = "* maximum file size 1MB";
            }
        }
    }
    elseif(empty($_FILES["dp"]['name'])){
        $dpErr="* Applicant's photo is required.";
    }elseif(isset($_FILES['dp']) && $_FILES['dp']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['dp']['type'];
        $tempFilePath = $_FILES['dp']['tmp_name'];
        $fileSize = $_FILES['dp']['size'];

        $allowed = array("image/jpeg", "image/jpg");
        list($width, $height) = getimagesize($tempFilePath);
        $rWidth=300;
        $rHeight=300;
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $dpErr = "* Only jpg and jpeg are allowed.";
        }
        elseif($width !== $rWidth && $height !== $rHeight){
            $dpErr="* photo resolution must be 300x300 pixels";
        }
        elseif($fileSize > $maxFileSize){
            $dpErr = "* maximum file size 1MB";
        }
    }
    elseif(empty($_FILES["gdp"]['name'])){
        $gdpErr="* Guardian's photo is required.";
    }elseif(isset($_FILES['gdp']) && $_FILES['gdp']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['gdp']['type'];
        $tempFilePath = $_FILES['gdp']['tmp_name'];
        $fileSize = $_FILES['gdp']['size'];

        $allowed = array("image/jpeg", "image/jpg");
        list($width, $height) = getimagesize($tempFilePath);
        $rWidth=300;
        $rHeight=300;
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $gdpErr = "* Only jpg and jpeg are allowed.";
        }
        elseif($width !== $rWidth && $height !== $rHeight){
            $gdpErr="* photo resolution must be 300x300 pixels";
        }
        elseif($fileSize > $maxFileSize){
            $gdpErr = "* maximum file size 1MB";
        }
    }
    elseif(empty($_FILES["ssctrans"]['name'])){
        $ssctransErr="* transcript of SSC is required";
    }elseif(isset($_FILES['ssctrans']) && $_FILES['ssctrans']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['ssctrans']['type'];
        $fileSize = $_FILES['ssctrans']['size'];

        $allowed = array("image/jpeg", "image/jpg", "image/png", "application/pdf");
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $ssctransErr = "* Only jpg, jpeg, png and pdf files are allowed.";
        }
        elseif($fileSize > $maxFileSize){
            $ssctransErr = "* maximum file size 1MB";
        }
    }
    elseif(empty($_FILES["hsctrans"]['name'])){
        $hsctransErr="* transcript of HSC is required";
    }elseif(isset($_FILES['hsctrans']) && $_FILES['hsctrans']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['hsctrans']['type'];
        $fileSize = $_FILES['hsctrans']['size'];

        $allowed = array("image/jpeg", "image/jpg", "image/png", "application/pdf");
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $hsctransErr = "* Only jpg, jpeg, png and pdf files are allowed.";
        }
        elseif($fileSize > $maxFileSize){
            $hsctransErr = "* maximum file size 1MB";
        }
    }
    elseif(empty($_FILES["testimonial"]['name'])){
        $testimonialErr="* testimonial is required";
    }elseif(isset($_FILES['testimonial']) && $_FILES['testimonial']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['testimonial']['type'];
        $fileSize = $_FILES['testimonial']['size'];

        $allowed = array("image/jpeg", "image/jpg", "image/png", "application/pdf");
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $testimonialErr = "* Only jpg, jpeg, png and pdf files are allowed.";
        }
        elseif($fileSize > $maxFileSize){
            $testimonialErr = "* maximum file size 1MB";
        }
    }
    elseif(empty($_FILES["gidcard"]['name'])){
        $gidcardErr="* Guardian's ID card is required";
    }elseif(isset($_FILES['gidcard']) && $_FILES['gidcard']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['gidcard']['type'];
        $fileSize = $_FILES['gidcard']['size'];

        $allowed = array("image/jpeg", "image/jpg", "image/png", "application/pdf");
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $gidcardErr = "* Only jpg, jpeg, png and pdf files are allowed.";
        }
        elseif($fileSize > $maxFileSize){
            $gidcardErr = "* maximum file size 1MB";
        }
    }
    elseif(empty($_FILES["bc"]['name'])){
        $bcErr="* Student's Birth Certificate is required";
    }elseif(isset($_FILES['bc']) && $_FILES['bc']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['bc']['type'];
        $fileSize = $_FILES['bc']['size'];

        $allowed = array("image/jpeg", "image/jpg", "image/png", "application/pdf");
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $bcErr = "* Only jpg, jpeg, png and pdf files are allowed.";
        }
        elseif($fileSize > $maxFileSize){
            $bcErr = "* maximum file size 1MB";
        }
    }
    else{
        header("Location:admissionAction.php");
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<nav class="navbar navbar-expand-lg navbar-dark ">
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
        <li class="nav-item">
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
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    </nav>

    <div class="container">
    <h2 class="pt-3">Undergraduate Admission Form</h2>
        <form class="admissionform my-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method ="post" enctype='multipart/form-data'>
            <div class="form-group">
                <label for="">Name of the Program</label>
                <select id="" class="form-select" aria-label="Default select example" name="program">
                    <option <?php if(!isset($_POST["program"])){echo 'selected';} ?>>Choose...</option>
                    <option value="bba" <?php if(isset($_POST["program"]) && $_POST["program"] == "bba"){echo 'selected';} ?>>Bachelor of Business Administration</option>
                    <option value="thm" <?php if(isset($_POST["program"]) && $_POST["program"] == "thm"){echo 'selected';} ?>>Bachelor of Tourism and Hospitality Management</option>
                    <option value="eng" <?php if(isset($_POST["program"]) && $_POST["program"] == "eng"){echo 'selected';} ?>>BA in English</option>
                    <option value="bang" <?php if(isset($_POST["program"]) && $_POST["program"] == "bang"){echo 'selected';} ?>>BA in Bangla</option>
                    <option value="llb" <?php if(isset($_POST["program"]) && $_POST["program"] == "llb"){echo 'selected';} ?>>Bachelor of Laws</option>
                    <option value="ism" <?php if(isset($_POST["program"]) && $_POST["program"] == "ism"){echo 'selected';} ?>>BA in Islamic Studies</option>
                    <option value="cse" <?php if(isset($_POST["program"]) && $_POST["program"] == "cse"){echo 'selected';} ?>>B.Sc in Computer Science and Engineering</option>
                    <option value="eee" <?php if(isset($_POST["program"]) && $_POST["program"] == "eee"){echo 'selected';} ?>>B.Sc in Electrical and Electronic Engineering</option>
                    <option value="arch" <?php if(isset($_POST["program"]) && $_POST["program"] == "arch"){echo 'selected';} ?>>Bachelor of Architecture</option>
                    <option value="ce" <?php if(isset($_POST["program"]) && $_POST["program"] == "ce"){echo 'selected';} ?>>B.Sc in Civil Engineering</option>
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
                    <option <?php if(!isset($_POST["gender"])){echo 'selected';} ?>>Choose...</option>
                    <option value="male" <?php if(isset($_POST["gender"]) && $_POST["gender"] == "male"){echo 'selected';} ?>>Male</option>
                    <option value="female" <?php if(isset($_POST["gender"]) && $_POST["gender"] == "female"){echo 'selected';} ?>>Female</option>
                    <option value="others" <?php if(isset($_POST["gender"]) && $_POST["gender"] == "others"){echo 'selected';} ?>>Others</option>
                </select>
                <span class="text-danger"><?php echo $genderErr;?></span>
            </div>
            <div class="form-group col-md-4">
                <label for="">Blood Group <span class="text-muted">(Optional)</span></label>
                <select id="" class="form-select" name="blood">
                    <option <?php if(!isset($_POST["blood"])){echo 'selected';} ?>>Choose...</option>
                    <option value="A+" <?php if(isset($_POST["blood"]) && $_POST["blood"] == "A+"){echo 'selected';} ?>>A+</option>
                    <option value="A-" <?php if(isset($_POST["blood"]) && $_POST["blood"] == "A-"){echo 'selected';} ?>>A-</option>
                    <option value="B+" <?php if(isset($_POST["blood"]) && $_POST["blood"] == "B+"){echo 'selected';} ?>>B+</option>
                    <option value="B-" <?php if(isset($_POST["blood"]) && $_POST["blood"] == "B-"){echo 'selected';} ?>>B-</option>
                    <option value="O+" <?php if(isset($_POST["blood"]) && $_POST["blood"] == "O+"){echo 'selected';} ?>>O+</option>
                    <option value="O-" <?php if(isset($_POST["blood"]) && $_POST["blood"] == "O-"){echo 'selected';} ?>>O-</option>
                    <option value="AB+" <?php if(isset($_POST["blood"]) && $_POST["blood"] == "AB+"){echo 'selected';} ?>>AB+</option>
                    <option value="AB-" <?php if(isset($_POST["blood"]) && $_POST["blood"] == "AB-"){echo 'selected';} ?>>AB-</option>
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
                    <option <?php if(!isset($_POST["sscboard"])){echo 'selected';} ?>>Choose Board...</option>
                    <option value="Barisal" <?php if(isset($_POST["sscboard"]) && $_POST["sscboard"] == "Barisal"){echo 'selected';} ?>>Barisal</option>
                    <option value="Chittagong" <?php if(isset($_POST["sscboard"]) && $_POST["sscboard"] == "Chittagong"){echo 'selected';} ?>>Chittagong</option>
                    <option value="Comilla" <?php if(isset($_POST["sscboard"]) && $_POST["sscboard"] == "Comilla"){echo 'selected';} ?>>Comilla</option>
                    <option value="Dhaka" <?php if(isset($_POST["sscboard"]) && $_POST["sscboard"] == "Dhaka"){echo 'selected';} ?>>Dhaka</option>
                    <option value="Dinajpur" <?php if(isset($_POST["sscboard"]) && $_POST["sscboard"] == "Dinajpur"){echo 'selected';} ?>>Dinajpur</option>
                    <option value="Jessore" <?php if(isset($_POST["sscboard"]) && $_POST["sscboard"] == "Jessore"){echo 'selected';} ?>>Jessore</option>
                    <option value="Rajshahi" <?php if(isset($_POST["sscboard"]) && $_POST["sscboard"] == "Rajshahi"){echo 'selected';} ?>>Rajshahi</option>
                    <option value="Sylhet" <?php if(isset($_POST["sscboard"]) && $_POST["sscboard"] == "Sylhet"){echo 'selected';} ?>>Sylhet</option>
                    <option value="Technical" <?php if(isset($_POST["sscboard"]) && $_POST["sscboard"] == "Technical"){echo 'selected';} ?>>Technical</option>
                    <option value="Madrasah" <?php if(isset($_POST["sscboard"]) && $_POST["sscboard"] == "Madrasah"){echo 'selected';} ?>>Madrasah</option>
                    <option value="DIBS(Dhaka)" <?php if(isset($_POST["sscboard"]) && $_POST["sscboard"] == "DIBS(Dhaka)"){echo 'selected';} ?>>DIBS(Dhaka)</option>
                </select>
                <span class="text-danger"><?php echo $sscboardErr;?></span>
            </div>
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="" name="sscins" placeholder="Institution" value="<?= isset($_POST['sscins']) ? $_POST['sscins'] : ''; ?>">
                <span class="text-danger"><?php echo $sscinsErr;?></span>
            </div>
            <div class="form-group col-md-2">
                <select id="" class="form-select" name="sscgroup">
                    <option <?php if(!isset($_POST["sscgroup"])){echo 'selected';} ?>>Choose Group...</option>
                    <option value="science" <?php if(isset($_POST["sscgroup"]) && $_POST["sscgroup"] == "science"){echo 'selected';} ?>>Science</option>
                    <option value="commerce" <?php if(isset($_POST["sscgroup"]) && $_POST["sscgroup"] == "commerce"){echo 'selected';} ?>>Commerce</option>
                    <option value="arts" <?php if(isset($_POST["sscgroup"]) && $_POST["sscgroup"] == "arts"){echo 'selected';} ?>>Arts</option>
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
                    <option <?php if(!isset($_POST["hscboard"])){echo 'selected';} ?>>Choose Board...</option>
                    <option value="Barisal" <?php if(isset($_POST["hscboard"]) && $_POST["hscboard"] == "Barisal"){echo 'selected';} ?>>Barisal</option>
                    <option value="Chittagong" <?php if(isset($_POST["hscboard"]) && $_POST["hscboard"] == "Chittagong"){echo 'selected';} ?>>Chittagong</option>
                    <option value="Comilla" <?php if(isset($_POST["hscboard"]) && $_POST["hscboard"] == "Comilla"){echo 'selected';} ?>>Comilla</option>
                    <option value="Dhaka" <?php if(isset($_POST["hscboard"]) && $_POST["hscboard"] == "Dhaka"){echo 'selected';} ?>>Dhaka</option>
                    <option value="Dinajpur" <?php if(isset($_POST["hscboard"]) && $_POST["hscboard"] == "Dinajpur"){echo 'selected';} ?>>Dinajpur</option>
                    <option value="Jessore" <?php if(isset($_POST["hscboard"]) && $_POST["hscboard"] == "Jessore"){echo 'selected';} ?>>Jessore</option>
                    <option value="Rajshahi" <?php if(isset($_POST["hscboard"]) && $_POST["hscboard"] == "Rajshahi"){echo 'selected';} ?>>Rajshahi</option>
                    <option value="Sylhet" <?php if(isset($_POST["hscboard"]) && $_POST["hscboard"] == "Sylhet"){echo 'selected';} ?>>Sylhet</option>
                    <option value="Technical" <?php if(isset($_POST["hscboard"]) && $_POST["hscboard"] == "Technical"){echo 'selected';} ?>>Technical</option>
                    <option value="Madrasah" <?php if(isset($_POST["hscboard"]) && $_POST["hscboard"] == "Madrasah"){echo 'selected';} ?>>Madrasah</option>
                    <option value="DIBS(Dhaka)" <?php if(isset($_POST["hscboard"]) && $_POST["hscboard"] == "DIBS(Dhaka)"){echo 'selected';} ?>>DIBS(Dhaka)</option>
                </select>
                <span class="text-danger"><?php echo $hscboardErr;?></span>
            </div>
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="" name="hscins" placeholder="Institution" value="<?= isset($_POST['hscins']) ? $_POST['hscins'] : ''; ?>">
                <span class="text-danger"><?php echo $hscinsErr;?></span>
            </div>
            <div class="form-group col-md-2">
                <select id="" class="form-select" name="hscgroup">
                    <option <?php if(!isset($_POST["hscgroup"])){echo 'selected';} ?>>Choose Group...</option>
                    <option value="science" <?php if(isset($_POST["hscgroup"]) && $_POST["hscgroup"] == "science"){echo 'selected';} ?>>Science</option>
                    <option value="commerce" <?php if(isset($_POST["hscgroup"]) && $_POST["hscgroup"] == "commerce"){echo 'selected';} ?>>Commerce</option>
                    <option value="arts" <?php if(isset($_POST["hscgroup"]) && $_POST["hscgroup"] == "arts"){echo 'selected';} ?>>Arts</option>
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

            <div class="form-group">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" name="checkwaiver" <?php if(isset($_POST['checkwaiver'])) echo 'checked'; ?>>
                <label class="form-check-label text-muted" for="gridCheck">
                    Check if you have any special waiver
                </label>
                </div>
            </div>

            <div class="form-row">
            <div class="form-group col-md-6">
            <label for="">Special Waiver</label>
            <select id="" class="form-select waiverfield" name="waiver" <?php if(!isset($_POST['checkwaiver'])) echo 'disabled'; ?>>
                    <option <?php if(!isset($_POST["waiver"])){echo 'selected';} ?>>Choose...</option>
                    <option value="FreedomFighter" <?php if(isset($_POST["waiver"]) && $_POST["waiver"] == "FreedomFighter"){echo 'selected';} ?>>Freedom Fighter's Son/Daughter (100%)</option>
                    <option value="Siblings" <?php if(isset($_POST["waiver"]) && $_POST["waiver"] == "Siblings"){echo 'selected';} ?>>Other Children of Same Parents (Provisional) (30%)</option>
                    <option value="TC" <?php if(isset($_POST["waiver"]) && $_POST["waiver"] == "TC"){echo 'selected';} ?>>Teacher's Children (10%)</option>
                    <option value="Tribal" <?php if(isset($_POST["waiver"]) && $_POST["waiver"] == "Tribal"){echo 'selected';} ?>>Tribal (10%)</option>
                    <option value="PD" <?php if(isset($_POST["waiver"]) && $_POST["waiver"] == "PD"){echo 'selected';} ?>>Physically Disabled (10%)</option>
            </select>
            <span class="text-danger"><?php echo $waiverErr;?></span>
            </div>
            <div class="form-group col-md-6">
                <label for="">Scan Copy of Original Document(s) Justifying the Special Waiver</label>
                <input  class="form-control waiverfield" type="file" id="waive" name="waiverimg" <?php if(!isset($_POST['checkwaiver'])) echo 'disabled'; ?> >
                <span class="text-danger"><?php echo $waiverimgErr;?></span>
                <img class="mt-2" width="150px" src="" alt="" id="wpreview">
            </div>
            <script>
                    waive.onchange = evt => {
                        const [file] = waive.files
                        if (file) {
                            wpreview.src = URL.createObjectURL(file)
                        }
                    }
            </script>
            </div>

            <script type="text/javascript">
                $(function () {
                    $("#gridCheck").click(function () {
                        if ($(this).is(":checked")) {
                            $(".waiverfield").removeAttr("disabled");
                            $(".waiverfield").focus();
                        } else {
                            $(".waiverfield").attr("disabled", "disabled");
                        }
                    });
                });
            </script>

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
                <div class="form-group col-md-4">
                    <label for="">Transcript of SSC</label>
                    <input type="file" class="form-control" id="ssctrans" name="ssctrans">
                    <span class="text-danger"><?php echo $ssctransErr;?></span>
                    <img class="mt-2" width="150px" src="" alt="" id="ssctranspreview">
                </div>
                <script>
                    ssctrans.onchange = evt => {
                        const [file] = ssctrans.files
                        if (file) {
                            ssctranspreview.src = URL.createObjectURL(file)
                        }
                    }
                </script>
                <div class="form-group col-md-4">
                    <label for="">Transcript of HSC</label>
                    <input type="file" class="form-control" id="hsctrans" name="hsctrans">
                    <span class="text-danger"><?php echo $hsctransErr;?></span>
                    <img class="mt-2" width="150px" src="" alt="" id="hsctranspreview">
                </div>
                <script>
                    hsctrans.onchange = evt => {
                        const [file] = hsctrans.files
                        if (file) {
                            hsctranspreview.src = URL.createObjectURL(file)
                        }
                    }
                </script>
                <div class="form-group col-md-4">
                    <label for="">Testimonial of Last Institution</label>
                    <input type="file" class="form-control" id="testimonial" name="testimonial">
                    <span class="text-danger"><?php echo $testimonialErr;?></span>
                    <img class="mt-2" width="150px" src="" alt="" id="testimonialpreview">
                </div>
                <script>
                    testimonial.onchange = evt => {
                        const [file] = testimonial.files
                        if (file) {
                            testimonialpreview.src = URL.createObjectURL(file)
                        }
                    }
                </script>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Guardian's ID Card</label>
                    <input type="file" class="form-control" id="gidcard" name="gidcard">
                    <span class="text-danger"><?php echo $gidcardErr;?></span>
                    <img class="mt-2" width="150px" src="" alt="" id="gidcardpreview">
                </div>
                <script>
                    gidcard.onchange = evt => {
                        const [file] = gidcard.files
                        if (file) {
                            gidcardpreview.src = URL.createObjectURL(file)
                        }
                    }
                </script>
                <div class="form-group col-md-6">
                    <label for="">Applicant's Birth Certificate</label>
                    <input type="file" class="form-control" id="bc" name="bc">
                    <span class="text-danger"><?php echo $bcErr;?></span>
                    <img class="mt-2" width="150px" src="" alt="" id="bcpreview">
                </div>
                <script>
                    bc.onchange = evt => {
                        const [file] = bc.files
                        if (file) {
                            bcpreview.src = URL.createObjectURL(file)
                        }
                    }
                </script>
            </div>

            <p><table class="text-danger font-weight-bold "><tr>
                <td class="align-top">[NB: </td>
                <td>1. Applicant's and Guardian's photo must be 300x300 and Colored.
                </tr>
                <tr>
                    <td></td>
                    <td>2. Documents must be scan copy of original documents. No photocopy.]</td>
                </tr></table>
            </P>
            <button type="submit" class="btn btn-primary" name="ugradad">Submit</button>
        </form>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>