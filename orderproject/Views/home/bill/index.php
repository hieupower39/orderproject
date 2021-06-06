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
    <script src="./javascript/detail.js"></script>
    <script>
        var logs = <?php echo json_encode($logs) ?>;
        var bill = <?php echo json_encode($bill[0]) ?>;
        var cart = <?php echo json_encode($cart) ?>;
        var lisProduct= <?php echo json_encode($products) ?>;
        userBill();
    </script>
</body>
</html>