<?php 

if (isset($_POST['ugradad'])) {
	include "config.php";

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
	$reg = $_POST['reg'];
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
	$waiver = "";
    $waiverimg = "";
	$dp = $_FILES['dp'];
	$gdp = $_FILES['gdp'];
    $ssctrans = $_FILES['ssctrans'];
	$hsctrans = $_FILES['hsctrans'];
    $testimonial = $_FILES['testimonial'];
	$gidcard = $_FILES['gidcard'];
    $bc = $_FILES['bc'];
    $password = substr(str_shuffle("1234567890"), 0, 5);

    $wd = "";

    if($_POST["checkwaiver"]){
        $waiver = $_POST["waiver"];
        $waiverimg = $_FILES["waiverimg"];
        $wd = "files/WD_".$reg.'.'.pathinfo($_FILES["waiverimg"]['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["waiverimg"]["tmp_name"], $wd);
    }

    $ap = "files/AP_".$reg.'.'.pathinfo($_FILES["dp"]['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["dp"]["tmp_name"], $ap);
    $gp = "files/GP_".$reg.'.'.pathinfo($_FILES["gdp"]['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["gdp"]["tmp_name"], $gp);
    $st = "files/ST_".$reg.'.'.pathinfo($_FILES["ssctrans"]['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["ssctrans"]["tmp_name"], $st);
    $ht = "files/HT_".$reg.'.'.pathinfo($_FILES["hsctrans"]['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["hsctrans"]["tmp_name"], $ht);
    $tm = "files/TM_".$reg.'.'.pathinfo($_FILES["testimonial"]['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["testimonial"]["tmp_name"], $tm);
    $gid = "files/GID_".$reg.'.'.pathinfo($_FILES["gidcard"]['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["gidcard"]["tmp_name"], $gid);
    $sbc = "files/BC_".$reg.'.'.pathinfo($_FILES["bc"]['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["bc"]["tmp_name"], $sbc);

    $sql = "INSERT INTO undergrad(program, name, fname, mname, permanent, present, number, 
    email, gnumber, dob, gender, blood, reg, sscyear, sscboard, sscins, sscgroup, sscroll, sscgpa, 
    hscyear, hscboard, hscins, hscroll, hscgpa, quota, quotadoc, ap, gp, ssctrans, hsctrans, testimonial, gidcard, bc, password) 
    VALUES('$program', '$name', '$fname', '$mname', '$permanent', '$present', '$number', '$email', '$gnumber', '$dob', 
    '$gender', '$blood', '$reg', '$sscyear', '$sscboard', '$sscins', '$sscgroup', '$sscroll', '$sscgpa', '$hscyear', 
    '$hscboard', '$hscins', '$hscgroup', '$hscroll', '$hscgpa', '$waiver', '$wd', '$ap', '$gp', '$st', '$ht', '$tm', '$gid', '$sbc', '$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:preStatus.php?success=We have received your application.");
    }
    else {
        header("location:admission.php?error=We couldn't receive your application, please submit again.");
    }
}



