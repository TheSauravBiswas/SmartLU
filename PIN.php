<?php
ob_start();
session_start();
if(!isset($_SESSION['logger'])){
	echo '<script>alert("You have to login first.")</script>';
	header('location:login.php');
}
@include 'config.php';

$lupayid=$page=$otp=$fees=$id=$error="";

if(isset($_POST['lupayid'])){
  $lupayid = $_POST['lupayid'];
}elseif(isset($_GET['lupayid'])){
  $lupayid = $_GET['lupayid'];
}
if(isset($_POST['otp'])){
  $otp = $_POST['otp'];
}elseif(isset($_GET['otp'])){
  $otp = $_GET['otp'];
}
if(isset($_POST['fees'])){
  $fees = $_POST['fees'];
}elseif(isset($_GET['fees'])){
  $fees = $_GET['fees'];
}
if(isset($_POST['id'])){
  $id = $_POST['id'];
}elseif(isset($_GET['id'])){
  $id = $_GET['id'];
}
if(isset($_POST['page'])){
  $page = $_POST['page'];
}elseif(isset($_GET['page'])){
  $page = $_GET['page'];
}
if(isset($_GET['error'])){
  $error=$_GET['error'];
}

$select = " SELECT * FROM lupay WHERE email = '$lupayid' AND otp ='$otp' ";
$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) == 0){
  header("location:OTP.php?error=* Incorrect OTP!&lupayid=".$lupayid."&fees=".$fees."&id=".$id."&page=".$page);
  ob_end_flush();
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>LU | LUPay</title>
    <link rel="icon" type="image/x-icon" href="logo-white.png">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    

    

  <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .login{
        background: #333;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
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

    
    <!-- Custom styles for this template -->
    <link href="signin2.css" rel="stylesheet">
  </head>



  
<body class="text-center login">
    
<main class="form-signin w-100 m-auto">
  <form action="<?php if($page=="makeup"){echo "PINaction.php";} elseif($page=="library"){echo "PINactionLib.php";} elseif($page=="tf"){echo "PINactionTF.php";} elseif($page=="supple"){echo "PINactionSupp.php";} elseif($page=="prov"){echo "PINactionProv.php";} elseif($page=="orig"){echo "PINactionOrig.php";} elseif($page=="ug"){echo "PINactionUg.php";} elseif($page=="grad"){echo "PINactionGrad.php";} ?>" method="post">
    <img class="mb-4" src="logo-white.png" alt="" width="150">
    <h1 class="h3 mb-3 fw-normal text-white">SmartLU</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="pin" placeholder="1234">
      <label for="floatingInput">PIN</label>
    </div>
    <div class="form-floating" hidden>
      <input type="number" class="form-control" id="floatingInput" name="fees" value="<?php echo $fees; ?>">
      <input type="number" class="form-control" id="floatingInput" name="id" value="<?php echo $id; ?>">
      <input type="email" class="form-control" id="floatingInput" name="lupayid" value="<?php echo $lupayid; ?>">
      <input type="text" class="form-control" id="floatingInput" name="otp" value="<?php echo $otp; ?>">
      <input type="text" class="form-control" id="floatingInput" name="page" value="<?php echo $page; ?>">
    </div>
    <span class="text-danger"><?php echo $error;?></span>

    <!--div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div-->
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Pay</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
  </form>
</main>


    
  </body>
</html>