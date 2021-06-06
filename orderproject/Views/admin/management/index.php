<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <?php include "./admin/header.php" ?>
    <div class="container-fluid" >
        <div class="row"> 
            
            <div class="manage col -md-9" id="manage">
            <div class="container">
                <h2>Danh sách đơn hàng</h2>          
                <table class="table table-dark table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Trạng thái đơn hàng</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody  id="bill">
                    
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div> 
    
    <?php include "./admin/footer.php" ?>
    <script>displayAllBill(<?php echo json_encode($bills); ?>)</script>
</body>
</html>