<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="flex-header">
    <div>
      <p style="color:black"><?php echo $_SESSION["admin"];?></p>
    </div>
    <div>
      <a href="http:/orderproject/index.php?controller=login&action=logout&param=admin">Đăng xuất</a>
    </div>
  </div>
    
    <nav class="navbar mt-0 navbar-expand-md bg-navbar-light sticky-top">
        <div class = "container-fluid">
          <!-- Brand -->
          <a class="navbar-brand" href="index.php?controller=admin  ">
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
            <a class="nav-link" href="index.php?controller=admin">Quản lý đơn hàng</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=admin&action=chart">Thống kê</a>
          </li>
        </ul>
      </div>
        </div>
      
      </nav>

</div> 
</body>
</html>

