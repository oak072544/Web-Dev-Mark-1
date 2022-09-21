<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <h1 align = center>Webboard Mark 1</h1>
    <hr>
    <div align = center>ต้องการดูกระทู้หมายเลข <?php $id = $_GET["id"]; echo $id; ?><br>
                        เป็นกระทู้หมายเลย<?php if($id%2 == 0){echo "คู่";} else {echo "คี่";} ?>
</div>
    <br>
    <table style="border: 2px solid black; width: 40%;" align="center">
            <tr style="background-color: #6CD2FE;"><td>แสดงความคิดเห็น</td></tr>
            
            <tr><td align="center"><textarea name="" id="" cols="50%" rows="20%"></textarea></td></tr>
   
            <tr><td align="center"><input type="submit" value="ส่งข้อความ"></td></tr>  
               
    </table>
    <br>
    <div style="text-align:center;"><a href="index.php">กลับไปหน้าหลัก</a></div>
</body>
</html>