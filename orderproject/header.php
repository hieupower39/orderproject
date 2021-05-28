<?php   
    $auth="";
    if(isset($_SESSION["auth"]))
    $auth=$_SESSION["auth"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="shortcut icon" type="image/jpg" href="logo.jpg">
  
</head>
<body>
  <header>
    <div>
      <div>
        <a class="navbar-brand" href="index.php">
          <img src="image/Brand.jpg" alt="" height="50">
        </a>
        <?php
            if(!isset($_SESSION["user"]))
                include "login.php";
            else
                include "logout.php";
        ?>
      </div>
    </div>
  </header>
  <!-- Navigation -->
  <nav class="navbar mt-0 navbar-expand-md bg-navbar-light sticky-top">
    <div class = "container-fluid">
      <!-- Brand -->
      <a class="navbar-brand" href="index.php">
        <img src="image/logo.jpg" alt="" width="50">
      </a>
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=product">Sản phẩm</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Dịch vụ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Đội ngũ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Liên hệ</a>
          </li>
        </ul>
      </div>
      <div class="nav-item ">
        <a class="nav-icon" id="nav-icon" href="./index.php?controller=cart">

        </a>

      </div>
      
    
    </div>
  </nav>
  
</body>
</html>