

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
</head>
<body>
    <?php include "./home/header.php";?>
    <div class="cart" id="bill" style="min-height: 350px;">
    
    </div>
    
    <?php include "./home/footer.php";?>
    <script src="./javascript/user.js"></script>
    <script>
        var bills =<?php echo json_encode($bills); ?>;
        displayBills();
    </script>
</body>
</html>