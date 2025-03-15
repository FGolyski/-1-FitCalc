<?php
session_start();

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $is_admin = ($username == 'Site_admin') ? true : false; // Sprawdzenie, czy użytkownik to "Site_admin"
} else {
    $username = "Not logged in";
    $is_admin = false;
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Fit Center</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="CSS/style.css" type="text/css">

</head>

<body class="bg-image">
<nav class="navbar navbar-expand-lg bg-light  ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">FitCenter</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="product_base_page.php">Calories</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Calculator
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="bmi_calc.php">BMI</a></li>
            <li><a class="dropdown-item" href="cal_calc.php">KCAL</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $username; ?>
          </a>
          <ul class="dropdown-menu">
            
          <?php if($username !== "Not logged in"): ?>
            <li><a class="dropdown-item" href="PHP/logout.php">Logout</a></li>
            <?php if($is_admin): ?>
            <li><a class="dropdown-item" href="admin_panel.php">Admin panel</a></li>
            <?php endif; ?> 
        <?php else: ?>
          <li><a class="dropdown-item" href="login.php">Login</a></li>
        <?php endif; ?>


          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main class="container text-dark bg-light rounded shadow-lg">
<div class="row my-4 justify-content-center">
    <div class="col-sm-10 py-2  page_title">
      <h1>Fit center - your new healthy home</h1>
    </div>

<div class="row mt-5">
    <div class="col-sm-6">
      <h3> Login panel</h3>
      <form method="post" action="php/login_script.php">
            <div class="row">
              <div class="col-sm-12">
                <label for="Username_1" class="form-label">Username</label>
                <input type="text" class="form-control" id="Username_1" name="username">
              </div>
            </div>
        
            <div class="row">
              <div class="col-sm-12">
                <label for="Password_1" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password_1" name="password">
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary mb-4">Submit</button>
              </div>
            </div>
      </form> 
         
            <div class="row">
              <div class="col-sm-12">
                <?php 
                if(isset($_GET['error'])){
                $brand = $_GET['error'];
                echo "<div class=\"alert alert-danger\" role=\"alert\">Wrong login or password</div>";
                } 
                ?>
              </div>
            </div>
</div>
        
    <div class="col-sm-6">
      <h3> Register panel</h3>
      <form method="post" action="php/register_script.php"> 
        <div class="row">
            <div class="col-sm-12"> 
              <label for="Username" class="form-label">Username</label>
              <input type="text" class="form-control" id="Username" name="username">
            </div>
        </div>
        
        <div class="row">
          <div class="col-sm-12"> 
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="password">
          </div>
        </div>

        <div class="row">
            <div class="col-sm-12"> 
              <button type="submit" class="btn btn-primary mb-4">Submit</button>
            </div>
        </div>
    </form>

        <div class="row">
            <div class="col-sm-12">
              <?php 
              if(isset($_GET['error_reg'])){
                $brand = $_GET['error_reg'];
                echo "<div class=\"alert alert-danger\" role=\"alert\">User already exists!</div>";
              } ?>
            </div>
        </div>
</div>  

<div class='last_bottom'></div>

</main>

<footer class="text-center text-lg-start fixed-bottom">
  <div class="text-center p-3 bg-light">
    © 2024 Copyright:
    <a class="text-body" href="">XYZ.COM</a>
  </div>
</footer>

</body>

</html>