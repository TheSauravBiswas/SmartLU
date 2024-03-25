<?php
session_start();
if(!isset($_SESSION['logger'])){
	echo '<script>alert("You have to login first.")</script>';
	header('location:login.php');
}
@include 'config.php';

$id = $_SESSION['logger']['uid'];
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
  <form action="LUPayID2.php" method="post">
    <img class="mb-4" src="logo-white.png" alt="" width="150">
    <h1 class="h3 mb-3 fw-normal text-white">LUPay</h1>

    <div class="form-floating">
      <input type="number" class="form-control" id="floatingInput" name="fees" value="3000" readonly>
      <input type="number" class="form-control" id="floatingInput" name="id" value="<?php echo $id; ?>" hidden>
      <input type="text" class="form-control" id="floatingInput" name="page" value="<?php echo "prov"; ?>" hidden>
      <label for="floatingInput">Payment amount</label>
    </div>

    <div class="checkbox mb-3">
      <label class="text-white">
        <input type="checkbox" value="yes" name="emergency" > In case of urgency, urgent fee Tk. 1500.00 will be added.<br>Certificate will be delivered within 03 (three) working days.
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Pay Online</button>
    <button class="w-100 btn btn-lg btn-success mt-2" type="submit" name="receipt">Download Receipt</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
  </form>
</main>

</body>
</html>