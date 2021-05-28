

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOME Fitness & Yoga Center</title>  
</head>
<body>
  <?php include "./header.php";?>
  <div class="container-fluid main">
    <h1>Sản phẩm</h1>
    <div class="container-fluid padding p-3 my-3 border" >
        <h3>Thực phẩm chức năng</h3>
        <div class="card-decks row" id="support">

        </div>
    </div>
    <div class="container-fluid padding p-3 my-3 border" >
        <h3>Phụ kiện tập Gym</h3>
        <div class="card-decks row" id="item">
            
        </div>
    </div>
  </div>
  <hr>
  <?php include "./footer.php";?>
  <script> 
    init(<?php echo json_encode($products); ?>);
  </script>
</body>
</html>


