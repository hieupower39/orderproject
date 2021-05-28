<?php 
    $var = json_encode($users);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>User</h1>
    <div id='let'></div>
    <script language='javascript'>
        let a = <?php echo json_encode($users) ?>;
        let html = `<p>${a[1].user_password}</p>`;
        document.getElementById('let').innerHTML = html;
    </script>   
</body>
</html>

