<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
</head>
<body>
    <?php include "./admin/header.php" ?>
    <div class="container-fluid" >
    
        <div class="row"> 
            
            <div class="manage col -md-9" id="manage">
                <div class="container" id="bill"> </div>
                
            </div>
        </div>
    </div> 
    
    <?php include "./admin/footer.php" ?>
    
    <script>
        var logs=<?php echo json_encode($logs); ?>; 
        var bill =<?php echo json_encode($bill); ?>;
        var products=<?php echo json_encode($products);?>;
        var cart = <?php echo json_encode($cart); ?>;
        billDetail();
    </script>
    
</body>
</html>