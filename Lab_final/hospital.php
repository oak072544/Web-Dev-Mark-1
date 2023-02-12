<?php
session_start();
if (!isset($_GET['id'])) {
    header("Location: hospital.php?id=0");
} else {
    $id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>hospital</title>
    <script>
        function myFunction1() {
            let r = confirm("ต้องการจะลบจริงหรือไม่?")
            return r;
        }
    </script>
</head>

<body>
    <div class="container">
        <?php
        $conn = new PDO("mysql:host=localhost;dbname=hospital;charset=utf8", "root", "");
        $sql = "SELECT * FROM doctor";


        ?>
        <div class="d-flex">
            <div>
                <label>หมอ:</label>
                <span class="dropdown">
                    <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="button2" data-bs-toggle="dropdown" aria-expanded="false"><?php
                                                                                                                                                    if ($id != 0)
                                                                                                                                                        foreach ($conn->query("SELECT d_name FROM doctor WHERE doctor_id = $id") as $row) {
                                                                                                                                                            echo $row['0'];
                                                                                                                                                        }
                                                                                                                                                    else {
                                                                                                                                                        echo '---ทั้งหมด---';
                                                                                                                                                    }
                                                                                                                                                    ?></button>
                    <ul class="dropdown-menu" aria-labelledby="button2">
                        <?php

                        echo "<li><a href=\"hospital.php?id=0\" class='dropdown-item' value=0 > ---ทั้งหมด---</a></li>";
                        foreach ($conn->query($sql) as $row) {
                            echo "<li><a href=\"hospital.php?id=" . $row['0'] . "\" class='dropdown-item' value=" . $row['doctor_id'] . ">" . $row['d_name'] . "</a></li>";
                        }
                        $conn = null;
                        ?>
                    </ul>
                </span>
            </div>
        </div>
        <br>
        <table class="table table-striped">
            <?php
            $conn = new PDO("mysql:host=localhost;dbname=hospital;charset=utf8", "root", "");
            $conn->exec("SET CHARACTER SET utf8");
            if ($id != 0) {
                $data = $conn->query("SELECT d.doctor_id,d.d_name,p.p_name,pro.symptom,pro.method,pro.datetime FROM patient p , doctor d , profile pro WHERE pro.patient_id = p.patient_id AND pro.doctor_id = $id AND pro.doctor_id = d.doctor_id order by pro.datetime DESC;");
            } else {
                $data = $conn->query("SELECT d.doctor_id,d.d_name,p.p_name,pro.symptom,pro.method,pro.datetime FROM patient p , doctor d , profile pro WHERE pro.patient_id = p.patient_id AND pro.doctor_id = d.doctor_id order by pro.datetime DESC;");
            }
            if ($data !== false) {
                $count = 1 ;
                while ($row = $data->fetch()) {
                    /*
               echo "<tr><td>";
               echo "[ ".$row['4']." ] ";   
               echo "<a href=\"post.php?id=".$row['0']."\" style=text-decoration:none>";            
               echo $row['1']."</a>";
               echo "<br>";
               echo $row['5']." - " . $row['3'];
               echo "</td></tr>";   
               */
                    //echo $row['0'] . $row['1'] . $row['2'] . $row['3'] . $row['4'] . "<br>";
                    echo "<tr><td>"."<label >"."$count".".</label>";
                    echo "คุณหมอ <b><ins>".$row['1']."</b></ins> ผู้ป่วย <b><ins>".$row['2']."</b></ins> <br>";
                    echo "อาการ <b>" . $row['3'] . "</b> วิธีรักษา <b>". $row['4'] . "</b> เข้ารักษาเมื่อ <b>". $row['5'] ."</b>";
                    echo "</td></tr>";
                    $count++;
                }
            }


            $conn = null;
            ?>
        </table>
    </div>
</body>

</html>