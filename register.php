<?php
    session_start();
    if(isset($_SESSION['id']))
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
    <title>Assignment_2[register]</title>
</head>
<body>
    <h1 style="text-align: center;">สมัครสมาชิค</h1>
    <hr>
    <table style="border: 2px solid black; width: 40%;" align="center">
        <tr style="background-color: #6CD2FE;"><td colspan="2">กรอกข้อมูล</td></tr>
        <tr><td>ชื่อบัญชี : </td><td><input type="text" name="username" size="20"></td></tr>
        <tr><td>รหัสผ่าน : </td><td><input type="password" name="pwd" size="20"><br></td></tr>
        <tr><td>ชื่อ-นามสกุล : </td><td><input type="text" name="name-surname" size="20"></td></tr>
        <tr><td>เพศ : </td><td><input type="radio" name="gender" id="male">ชาย <br>
                                <input type="radio" name="gender" id="female">หญิง <br>
                                <input type="radio" name="gender" id="other">อื่นๆ </td></tr>
        <tr><td>อีเมลล์ : </td><td><input type="text" name="email" size="20"></td></tr>
        <tr><td colspan="2" align="center"><input type="submit" value="สมัครสมาชิค"></td></tr>
    </table>
    <br>
    <div style="text-align: center;"><a href="index.php">กลับไปหน้าหลัก</a></div>
</body>
</html>