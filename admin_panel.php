<?php
session_start();

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = "Not logged in";
    header("Location: ./index.php");
    exit();
}
if ($username != "site_admin") {
    header("Location: ./index.php");
    exit();
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
<script src="JS/calorie.js"></script>
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
           <?php if($_SESSION['isadmin']): ?>
            <li><a class="dropdown-item" href="admin_panel.php">Admin panel</a></li>
           <?php endif; ?> 
          <?php else: ?>
             <li><a class="dropdown-item" href="login.php">Login</a></li>
          <?php endif; ?>
          </ul>
        </li>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main class="container text-dark bg-light rounded shadow-lg">
<div class="row my-4 justify-content-center">
    <div class="col-sm-10 py-2  page_title">
        <h1 class="text-center">User management</h1>
    </div>
</div>

<div class="row my-4 justify-content-center">
    <div class="col-sm mt-2">
      <form method="post" action="PHP/user_management.php">
      <label for="user_list" class="form-label">User</label>
        <select class="form-control" id="user_list" name="user_list">
          <?php include 'PHP/users.php'; ?>
        </select>
    </div>
</div>

<div class="row justify-content-center">
  <div class="col-sm">
      <label for="password" class="form-label">Password</label>
      <input type="text" class="form-control" placeholder="New password" id="password" name="password">
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-sm-5 mt-4">
      <button type="submit" class="btn btn-success form-control" name="action" value="change_password">Change password</button>
  </div>

  <div class="col-sm mt-3">
      <?php 
        if(isset($_GET['remove_success'])){
          $brand = $_GET['remove_success'];
          echo "<div class=\"alert alert-success \" role=\"alert\">User removed!</div>";
        } ?>
              <?php 
        if(isset($_GET['change_success'])){
          $brand = $_GET['change_success'];
          echo "<div class=\"alert alert-success \" role=\"alert\">Password succesfully changed!</div>";
        } 
      ?>
  </div>

  <div class="col-sm-5 mt-4">
      <button type="submit" class="btn btn-danger form-control" name="action" value="delete">Delete user</button>
      </form>
  </div>

</div>


<div class="row my-4 justify-content-center">
  <div class="col-sm-10 py-2  page_title">
      <h1 class="text-center">Article creator</h1>
  </div>
</div>

<div class="row">
  <div class="col-sm">
      <form action="php/submit_article.php" enctype="multipart/form-data" method="post">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" class="form-control" required>
  </div>
</div>

<div class="row">
  <div class="col-sm">
      <label for="content">Article</label>
      <textarea  name="content" rows="5" cols="50" id="content"  class="form-control" required></textarea>
  </div>
</div>
 
<div class="row">
  <div class="col-sm">
      <label for="image">Photo</label>
      <input type="file"  name="image" id="image" accept="image/*" class="form-control" required>
  </div>
</div>

<div class="row mt-1 justify-content-center">
  <div class="col-sm-8">
      <button type="submit" class="btn btn-success form-control">Submit</button>
      </form>
  </div>
</div>

<div class="row mt-1">
  <div class="col-sm">
      <?php 
      if(isset($_GET['add_article'])){
        $brand = $_GET['add_article'];
        echo "<div class=\"alert alert-success \" role=\"alert\">Article succesfully added!</div>";
      } ?>
  </div>
</div>

<div class="row my-4 justify-content-center">
  <div class="col-sm-10 py-2 page_title">
    <h1 class="text-center">Article management</h1>
  </div>
</div>

<?php 
      if(isset($_GET['change_article'])){
        $brand = $_GET['change_article'];
        echo "<div class=\"alert alert-success\" role=\"alert\">Successfully changed!</div>";
      }
            if(isset($_GET['remove_article'])){
        $brand = $_GET['remove_article'];
        echo "<div class=\"alert alert-success\" role=\"alert\">Successfully removed!</div>";
      } 
?>

<div class="row my-4">
  <div class="col-sm">
     <?php include 'PHP/edit_main_script.php'; ?>
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
