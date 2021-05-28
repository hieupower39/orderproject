<?php
  session_start();
  if($_REQUEST != null){
  include "request.php";
  return;
  } 
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOME Fitness & Yoga Center</title>
</head>
<body>
  <?php include "header.php"; ?>  
  <!--Middle of page-->
  <div class="container-fluid main">
    <!-- Carousel -->
    <div id="slides" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
        <li data-target="#slides" data-slide-to="3"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image/carousel0.png" alt="">
          
        </div>
        <div class="carousel-item">
          <img src="image/carousel1.jpg" alt="">
        </div>
        <div class="carousel-item">
          <img src="image/carousel2.png" alt="">
        </div>
        <div class="carousel-item">
          <img src="image/carousel3.png" alt="">
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
    <div class="container-fluid">
      <div class="jumbotron">
        <div class="col -xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
          <p>Tập luyện chuyên nghiệp tại hệ thống phòng tập chuẩn 5 sao</p>
      </div>
        <a href="#">
          <button type="button" class="btn btn-secondary">Đăng ký ngay</button>
        </a>
      </div>
    </div>
    
    <div class="container-fluid">
      <div class="row welcom text-center">
        <div class="col-12">
          <h1 class="display-4">Khám phá ngay</h1>
          <!-- Horizontal rule -->
          <hr>
          <div class="col-12">
            <p>Phòng tập với các thiết bị hiện đại và huấn luyện viên chuyên nghiệp</p>
          </div>
        </div>
      </div>
    </div> 
    <!--Product-->
    <div class="container-fluid">
      <div class="row" id="list-ticket">
        
      </div>
    </div>
  </div>
  <hr>  
  <?php include "footer.php"; ?> 
  <script src="home.js"></script>
</body>
</html>

