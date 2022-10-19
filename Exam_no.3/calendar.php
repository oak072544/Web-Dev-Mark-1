<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>result</title>
</head>
<body>
    <?php
        $month = $_POST["month"];
        $year = $_POST["year"];
        $day = $_POST["day"];
        $feb;

        if ($month == "มกราคม")
        {
            $feb = false;
        }
        else if ($month == "กุมภาพันธ์")
        {
            $feb = true;
        }
        else
        {
            die;
        }
    ?>
</body>
</html>