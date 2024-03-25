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

include 'config.php';

$myID = $_SESSION['logger']['uid'];
$sqlMU = "SELECT * FROM makeup WHERE sid = '$myID' AND cstatus = 'Approved' AND fees = 0";
$approvedMU = mysqli_num_rows(mysqli_query($conn, $sqlMU));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LU | Makeup Application</title>
    <link rel="icon" type="image/x-icon" href="logo-white.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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

$dept = $name = $sid = $semester = $ccode = $ctitle = $cteacher = $exam = $doc = $docp = "";
$ctdErr = $dbErr= NULL;
$deptErr = $nameErr = $ctdeptErr = $sidErr = $semseaErr = $semyearErr = $ccodeErr = $ctitleErr = $cteacherErr = $examErr = 
$docErr = "";
$result = $sql = NULL;
$fileType=$fileSize=$allowed=$maxFileSize="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$sid = $_SESSION['logger']['uid'];
	$name = $_SESSION['logger']['name'];
	$semester = $_POST['semsea']."-".$_POST['semyear'];
    $dept = $_SESSION['logger']['dept'];
	$ccode = $_POST['ccode'];
	$ctitle = $_POST['ctitle'];
    if(isset($_POST['ctdept'])){
        $ctdept = $_POST['ctdept'];
        if ($ctdept=="Choose...") {
            $ctdErr = "* course teacher's dept is required";
        }
    }
	$cteacher = $_POST['cteacher'];
    if(isset($_POST['codename'])){$codename = $_POST['codename'];}
	$exam = $_POST['exam'];
    $doc = $_FILES['doc'];
    
    
    if($_POST["semsea"]=="Choose...") {
        $semseaErr = "* this field is required";
    }elseif(empty($_POST["semyear"])){
        $semyearErr="* semester year is required";
    }elseif(!preg_match("/^\d{4}$/", $_POST["semyear"])){
        $semyearErr="* invalid format";
    }
    elseif ($_POST["exam"]=="Choose...") {
        $examErr = "* this field is required";
    }
    elseif(empty($_POST["ccode"])){
        $ccodeErr="* Course Code is required";
    }elseif(!preg_match("/^[A-Z]{3}-[0-9]{4}$/", $_POST["ccode"])){
        $ccodeErr="* invalid course code";
    }
    elseif(empty($_POST["ctitle"])){
        $ctitleErr="* Course Title is required";
    }elseif(strlen($_POST["ctitle"]) > 50) {
        $ctitleErr="* invalid course title";
    }elseif(!preg_match("/^[a-zA-Z\s]+$/", $_POST["ctitle"])){
        $ctitleErr="* invalid course title";
    }
    elseif (isset($ctdErr)) {
        $ctdeptErr = $ctdErr;
    }
    elseif(empty($_POST["cteacher"])){
        $cteacherErr="* name is required";
    }elseif($_POST["cteacher"]=="Choose..."){
        $cteacherErr="* name is required";
    }
    elseif(empty($_FILES['doc']['name'])){
        $docErr="* provide supporting document(s)";
    }elseif(isset($_FILES['doc']) && $_FILES['doc']['error'] === UPLOAD_ERR_OK){
        $fileType = $_FILES['doc']['type'];
        $fileSize = $_FILES['doc']['size'];

        $allowed = array("application/pdf");
        $maxFileSize = 1048576;
        if(!in_array($fileType, $allowed)) {
            $docErr = "* Only pdf file is allowed.";
        }
        elseif($fileSize > $maxFileSize){
            $docErr = "* maximum file size 1MB";
        }
        else{
            $docp = "files/makeup/".$sid.$semester.$exam.$ccode.'.'.pathinfo($_FILES["doc"]['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["doc"]["tmp_name"], $docp);
    
            $sql = "INSERT INTO makeup(sid, name, semester, dept, ccode, ctitle, ctdept, cteacher, codename, exam, docp, cstatus, 
            ctstatus, hstatus, date, time, fees) VALUES('$sid', '$name', '$semester', '$dept', '$ccode', '$ctitle', 
            '$ctdept', '$cteacher', '$codename', '$exam', '$docp', 'Pending', 'Pending', 'Pending', '0', '0', '0')";
            
            $result = mysqli_query($conn, $sql);
    
            if($result){
                header("location:preStatusMakeup.php?success=We have received your application.");
                ob_end_flush();
                exit;
            }
            else{
                $dbErr="* We couldn't receive your application, please submit again.";
            }
        }
    }
}

/*function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}*/
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
            <a class="nav-link" href="index2.php">Home <span class="sr-only">(current)</span></a>
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
        <a href="logout.php"><button class="btn btn-outline-success my-2 my-sm-0">Logout</button></a>
    </div>
    </nav>

    <div class="container">
    <h2 style="padding-top: 85px;">Makeup Application Form</h2>
        <?php if ($dbErr) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $dbErr;?>
            </div>
        <?php } ?>
        <form class="admissionform my-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method ="post" enctype='multipart/form-data'>
            
            <div class="form-row"><div class="form-group col-md-6">
            <a class="d-grid btn btn-info mx-auto" href="makeupStatus.php">
                Already applied? Click here to view applicaiton status.
                <?php if($approvedMU) { ?>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-light">
                    <?php echo $approvedMU; ?>
                </span>
                <?php } ?>
            </a></div></div>

            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="semester">Semester</label>
                <select id="ctdept" class="form-select" aria-label="Default select example" name="semsea">
                    <option <?php if(!isset($_POST["semsea"])){echo 'selected';} ?>>Choose...</option>
                    <option <?php if(isset($_POST["semsea"]) && $_POST["semsea"] == "Spring"){echo 'selected';} ?>>Spring</option>
                    <option <?php if(isset($_POST["semsea"]) && $_POST["semsea"] == "Fall"){echo 'selected';} ?>>Fall</option>
                </select>
                <span class="text-danger"><?php echo $semseaErr;?></span>
            </div>
            <div class="form-group col-md-3">
                <label for="semester" class="text-white">Semester</label>
                <input type="text" class="form-control" id="semester" name="semyear" placeholder="2024" value="<?= isset($_POST['semyear']) ? $_POST['semyear'] : ''; ?>">
                <span class="text-danger"><?php echo $semyearErr;?></span>
            </div>
            <div class="form-group col-md-6">
                <label for="exam">Exam</label>
                <select id="exam" class="form-select" aria-label="Default select example" name="exam">
                    <option <?php if(!isset($_POST["dept"])){echo 'selected';} ?>>Choose...</option>
                    <option <?php if(isset($_POST["exam"]) && $_POST["exam"] == "Mid-Term"){echo 'selected';} ?>>Mid-Term</option>
                    <option <?php if(isset($_POST["exam"]) && $_POST["exam"] == "Final"){echo 'selected';} ?>>Final</option>
                </select>
                <span class="text-danger"><?php echo $examErr;?></span>
            </div>
            </div>

            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ccode">Course Code</label>
                <input type="text" class="form-control" id="ccode" name="ccode" placeholder="CSE-1234" value="<?= isset($_POST['ccode']) ? $_POST['ccode'] : ''; ?>">
                <span class="text-danger"><?php echo $ccodeErr;?></span>
            </div>
            <div class="form-group col-md-6">
                <label for="ctitle">Course Title</label>
                <input type="text" class="form-control" id="ctitle" name="ctitle" placeholder="Machine Learning" value="<?= isset($_POST['ctitle']) ? $_POST['ctitle'] : ''; ?>">
                <span class="text-danger"><?php echo $ctitleErr;?></span>
            </div>
            </div>

            <div class="form-row">
            <div class="form-group col-md-5">
                <label for="ctdept">Department of Course Teacher</label>
                <select id="cd" class="form-select" aria-label="Default select example" name="ctdept">
                    <option selected>Choose...</option>
                    <option>Business Administration</option>
                    <option>Tourism and Hospitality Management</option>
                    <option>English</option>
                    <option>Bangla</option>
                    <option>Laws</option>
                    <option>Islamic Studies</option>
                    <option>Computer Science and Engineering</option>
                    <option>Electrical and Electronic Engineering</option>
                    <option>Architecture</option>
                    <option>Civil Engineering</option>
                </select>
                <span class="text-danger"><?php echo $ctdeptErr;?></span>
            </div>
            <div class="form-group col-md-5">
                <label for="cteacher">Course Teacher</label>
                <select id="ct" class="form-select" aria-label="Default select example" name="cteacher">
                </select>
                <span class="text-danger"><?php echo $cteacherErr;?></span>
            </div>
            <script>
                $(document).ready(function () {
                    $("#cd").change(function () {
                        var val = $(this).val();
                        if (val == "Computer Science and Engineering") {
                            $("#ct").html("<option>Choose...</option><option value='Rumel M. S. Rahman Pir'>Rumel M. S. Rahman Pir (RMS)</option><option value='Rana M Luthfur Rahman Pir'>Rana M Luthfur Rahman Pir (RLP)</option><option value='Syeda Tamanna Alam Monisha'>Syeda Tamanna Alam Monisha (STA)</option>");
                        }
                        else if (val == "Electrical and Electronic Engineering") {
                            $("#ct").html("<option>Choose...</option><option value='Rafiqul Islam'>Rafiqul Islam (MRI)</option><option value='S. M. Tanbinul Haque'>S. M. Tanbinul Haque (STH)</option><option value='Ishmam Ahmed Chowdhury'>Ishmam Ahmed Chowdhury (IAC)</option>");
                        }
                    });
                });
            </script>
            <div class="form-group col-md-2">
                <label for="codename">Acronym</label>
                <select id="cn" class="form-select" aria-label="Default select example" name="codename">
                </select>
            </div>
            <script>
                $(document).ready(function () {
                    $("#ct").change(function () {
                        var val = $(this).val();
                        if (val == "Rumel M. S. Rahman Pir") {
                            $("#cn").html("<option>RMS</option>");
                        }
                        else if (val == "Rana M Luthfur Rahman Pir") {
                            $("#cn").html("<option>RLP</option>");
                        }
                        else if (val == "Syeda Tamanna Alam Monisha") {
                            $("#cn").html("<option>STA</option>");
                        }
                        else if (val == "Rafiqul Islam") {
                            $("#cn").html("<option>MRI</option>");
                        }
                        else if (val == "S. M. Tanbinul Haque") {
                            $("#cn").html("<option>STH</option>");
                        }
                        else if (val == "Ishmam Ahmed Chowdhury") {
                            $("#cn").html("<option>IAC</option>");
                        }
                    });
                });
            </script>
            </div>

            <div class="form-row">
            <div class="form-group col-md-12">
                <label for="">Supporting Document</label>
                <input type="file" class="form-control" id="doc" name="doc">
                <span class="text-danger"><?php echo $docErr;?></span>
            </div>
            </div>

            <button type="submit" class="btn btn-primary" name="makeup">Submit</button>
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