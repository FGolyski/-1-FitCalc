<?php
session_start();

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = "Not logged in";
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
<link rel="stylesheet" href="CSS/style_products.css" type="text/css">
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
           <?php if($username === 'Site_Admin'): ?>
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

<?php if($username !== "Not logged in"): ?>

<div class="row my-4 justify-content-center">
  <div class="col-sm-10 py-2  page_title">
      <h1>Product calories database</h1>
  </div>
</div>

<div class="row mt-4">
  <div class="col-sm pt-2">
      <h3 class="text-center">Add your own product!</h3>
  </div>
</div>

<form method="post" action="php/add_product.php">
  <div class="row mt-2">
      <div class="col-sm">
        <label for="name" class="form-label">Product</label>
        <input type="text" id="name" name = "name" class="form-control" required>
      </div>

      <div class="col-sm">
        <label for="kcal" class="form-label">Kcal</label>
        <input type="number" id="kcal" name = "kcal" class="form-control" required>
      </div>

      <div class="col-sm">
        <label for="proteins" class="form-label">Proteins</label>
        <input type="number" id="proteins" name = "proteins" class="form-control" required>
      </div>

      <div class="col-sm">
        <label for="fat" class="form-label">Fat</label>
        <input type="number" id="fat" name = "fat" class="form-control" required>
      </div>

      <div class="col-sm">
        <label for="carbs" class="form-label">Carbs</label>
        <input type="number" id="carbs" name = "carbs" class="form-control" required>
      </div>

  </div>

  <div class="row justify-content-center my-2">
    <div class="col-sm-1">
      <button type="submit" class="btn btn-lg btn-primary">Submit</button>
    </div> 
  </div>
</form>  

<div class="row mt-2">
    <div class="col-sm">
      <?php 
      if(isset($_GET['add_success'])){
        $brand = $_GET['add_success'];
        echo "<div class=\"alert alert-success\" role=\"alert\">Successfully added!</div>";
      }  
      if(isset($_GET['remove_success'])){
        $brand = $_GET['remove_success'];
        echo "<div class=\"alert alert-success\" role=\"alert\">Successfully removed!</div>";
      } ?>
    </div>  
</div>
      

<div class="row justify-content-center mt-3 page_header">
    <div class="col-sm-4 ">
        <h3>Name</h3>
        <p>Kcal [Proteins, Fat, Carbs]</p>
    </div>

    <div class="col-sm-4">
        <p class="text-center">Added by</p>
    </div> 

  <?php if($username === 'Site_Admin'): ?>
    <div class="col-sm-3">  
    </div>
  <?php endif; ?> 
</div>

<div id="content">
  <?php include 'PHP/product_base_script.php'; ?>
</div>

<div class='last_bottom'></div>

<?php else: ?>
  <div class="row my-4 justify-content-center">
    <div class="col-sm-10 py-2  page_title">
    <h1>Fit center - your new healthy home</h1>
  </div>
</div>

<div class="row my-4 justify-content-center">
   <div class="col-sm">
      <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
  
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="slider/3.jpg" class="d-block w-100" alt="Kcal calc">
            <div class="carousel-caption d-none d-md-block slider_text">
                <h2>Kcal calc</h2>
                <h1>Features for logged users</h1>
            </div>
        </div>

        <div class="carousel-item">
          <img src="slider/2.jpg" class="d-block w-100" alt="Bmi calc">
            <div class="carousel-caption d-none d-md-block slider_text">
              <h2>Bmi calc</h2>
              <h1>Features for logged users</h1>
            </div>
        </div>

        <div class="carousel-item">
          <img src="slider/1.jpg" class="d-block w-100" alt="Kcal db">
            <div class="carousel-caption d-none d-md-block slider_text">
              <h2>Products kcal db</h2>
              <h1>Features for logged users</h1>
            </div>
      </div>
  </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  </div>
</div>
<div class='last_bottom'></div>
<?php endif; ?>
</main>

</html>