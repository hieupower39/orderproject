<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê</title>
</head>
<body>
    <?php include "./admin/header.php" ?>
    <div class="container-fluid" >
    <div id="piechart"></div>
    </div> 
    
    <?php include "./admin/footer.php" ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Trạng thái', 'Số đơn'],
        ['Chưa xác nhận', <?php echo $static0; ?>],
        ['Đã xác nhận', <?php echo $static1; ?>],
        ['Đang giao', <?php echo $static2; ?>],
        ['Đã hoàn thành', <?php echo $static3; ?>],
        ['Đã hủy', <?php echo $static4; ?>]
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'Trạng thái đơn hàng', 'width':550, 'height':400};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
        }
    </script>
</body>
</html>