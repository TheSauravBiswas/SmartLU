<?php

session_start();
@include 'config.php';

$error="";

if(isset($_POST['submit'])){

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = $_POST['password'];

  $select = " SELECT * FROM login WHERE email = '$email' AND password ='$pass' ";

  $results = mysqli_query($conn, $select);

  if(mysqli_num_rows($results) > 0){

    $row = mysqli_fetch_array($results);
    
    if($row['indx']=="dregistrar"){
      $_SESSION['logger'] = $row;
      header("location:indexDRegistrar.php");
      exit;
    }
    elseif($row['indx']=="librarian"){
      $_SESSION['logger'] = $row;
      header("location:indexLibrarian.php");
      exit;
    }
    elseif($row['indx']=="registrar"){
      $_SESSION['logger'] = $row;
      header("location:indexRegistrar.php");
      exit;
    }
    elseif($row['indx']=="dfa"){
      $_SESSION['logger'] = $row;
      header("location:indexDFA.php");
      exit;
    }
    elseif($row['indx']=="acontroller"){
      $_SESSION['logger'] = $row;
      header("location:indexAController.php");
      exit;
    }
    elseif($row['status']=="Student"){
      $_SESSION['logger'] = $row;
      header("location:index2.php");
      exit;
    }
    elseif($row['status']=="Controller of Examinations"){
      $_SESSION['logger'] = $row;
      header("location:indexController.php");
      exit;
    }
    elseif($row['status']=="Head"){
      $_SESSION['logger'] = $row;
      header("location:indexHead.php");
      exit;
    }
    elseif($row['status']=="Adjunct Lecturer" || $row['status']="Lecturer" || $row['status']="Assistant Professor" || $row['status']="Associate Professor" || $row['status']="Professor"){
      $_SESSION['logger'] = $row;
      header("location:indexCT.php");
      exit;
    }
  }
     
  else{
    $error = "* incorrect email or password!";
  }
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
    <title>LU | Log in</title>
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
    <link href="signin.css" rel="stylesheet">
  </head>



  
<body class="text-center login">
    
<main class="form-signin w-100 m-auto">
  <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
    <img class="mb-4" src="logo-white.png" alt="" width="150">
    <h1 class="h3 mb-3 fw-normal text-white">SmartLU</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <span class="text-danger"><?php echo $error;?></span>

    <!--div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div-->
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Log in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
  </form>
</main>


    
  </body>
</html>