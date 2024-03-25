<?php/*
	include 'config.php';
    include 'admission.php';

    $password = substr(str_shuffle("1234567890"), 0, 5);

    $sql = "INSERT INTO undergrad(program, name, fname, mname, permanent, present, number, 
    email, gnumber, dob, gender, blood, reg, sscyear, sscboard, sscins, sscgroup, sscroll, sscgpa, 
    hscyear, hscboard, hscins, hscgroup, hscroll, hscgpa, quota, quotadoc, ap, gp, ssctrans, hsctrans, testimonial, gidcard, bc, password) 
    VALUES('$program', '$name', '$fname', '$mname', '$permanent', '$present', '$number', '$email', '$gnumber', '$dob', 
    '$gender', '$blood', '$reg', '$sscyear', '$sscboard', '$sscins', '$sscgroup', '$sscroll', '$sscgpa', '$hscyear', 
    '$hscboard', '$hscins', '$hscgroup', '$hscroll', '$hscgpa', '$waiver', '$wd', '$ap', '$gp', '$st', '$ht', '$tm', '$gid', '$sbc', '$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:preStatus.php?success=We have received your application.");
        exit;
    }
    else {
        header("location:admission.php?error=We couldn't receive your application, please submit again.");
        exit;
    }
    */
    ?>