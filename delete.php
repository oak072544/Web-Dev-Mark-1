<?php
    session_start();
    if($_SESSION['role']!='a')
    {
        header("location:index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete complete</title>
</head>
<body>
    <?php 
        $id = $_GET["id"]; 
        echo "ลบกระทู้ หมายเลข ".$id; 
    ?>
</body>
</html>