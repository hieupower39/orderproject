<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOME Fitness & Yoga Center</title>
  
</head>
<body>
    <?php include "./home/header.php"; ?>
  <div class="cart" id="cart" style="min-height: 350px;">
    
  </div>
  <hr>
  <?php include "./home/footer.php";?>
  
  <script>
      loginStatic = <?php echo $login ?>;
      show(<?php echo json_encode($products); ?>);
  </script>
</body>
</html>