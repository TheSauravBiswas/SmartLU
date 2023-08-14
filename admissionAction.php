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

    if($_POST["checkwaiver"]){
        $waiver = $_POST["waiver"];
        $waiverimg = $_FILES["waiverimg"];
    }

    $sql = "INSERT INTO undergrad(program, quota) 
               VALUES('$program', '$waiver')";
    $result = mysqli_query($conn, $sql);

}



