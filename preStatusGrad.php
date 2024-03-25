
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LU | Confirmation</title>
    <link rel="icon" type="image/x-icon" href="logo-white.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

    <script src="jquery-slim.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">

    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');

        body{
            background: #EDEADE;
            font-family: 'Ubuntu', sans-serif;
        }
        .navbar{
            background: #333;
        }
        .label{
            float: right;
        }
        .container h1, h2{
            text-align: center;
        }
        .card{
            border: none;
            background: #EDEADE;
            border-radius: 10px;
            cursor: pointer;
            -webkit-transform-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-property: transform;
            transition-property: transform;
        }
        .card-img-top{
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .card-body{
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .card:hover {
            -webkit-transform: scale(1.05);
            transform: scale(1.05);
        }
        .card:active {
            -webkit-transform: scale(.9);
            transform: scale(.9);
        }
    </style>
</head>

<body>
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
            <a class="nav-link" href="index.php">Home</a>
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
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </form>
        <a href="login.php"><button class="btn btn-outline-success my-2 my-sm-0">login</button>
    </div>
    </nav>

    <div class="container">
    <div class="row pt-2 d-flex justify-content-center">
    <div class="card col-md-12 mb-4" style="width: 36rem;">
        <div class="card-body bg-dark">
            <h5 class="card-title">
                <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success" role="alert">
                <?php echo $_GET['success']; ?>
                </div>
                <?php } ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">View your application status.</h6>
            <p class="card-text">
                Use your Registration no. and the password sent to your email address to access.
            </p>
            <a href="gStatusLogin.php" class="btn btn-primary stretched-link">Application Status</a>
            <!--a href="#" class="card-link">Another link</a-->
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>