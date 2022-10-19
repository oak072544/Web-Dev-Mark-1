<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
</head>
<body>
    <form action="calendar.php" method="POST">
    กรุณากรอกเดือน : <input type="text" name="month" > <br>
    กรุณากรอกปี(พ.ศ.) : <input type="text" name="year" > <br>
    วันที่ 1 ของเดือนตรงกับวัน <select name="day">
            <option value="mo">วันจันทร์</option>
            <option value="tu">วันอังคาร</option>
            <option value="we">วันพุธ</option>
            <option value="th">วันพฤหัสบดี</option>
            <option value="fr">วันศุกร์</option>
            <option value="se">วันเสาร์</option>
            <option value="su">วันอาทิตย์</option>
            </select><br>
    <input type="submit" value="ตกลง"><a href="index.php"><input type="button" value="ล้างข้อมูล"></a>
    </form>
</body>
</html>