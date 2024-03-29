<?php
session_start();
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
    <!--Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Post</title>
</head>

<body>
    <div class="container">
        <h1 align=center>Webboard Mark 1</h1>
        <?php
            include "nav.php"; 
        ?> 
        <section class="col-md-5 mx-auto m-3">
    <?php
    isset($_GET['id']) ? $id= $_GET['id'] : header("Location: index.php");
    echo "<center>ต้องการดูกระทู้หมายเลข $id <br>";
    if($id % 2 == 0){
        echo "เป็นกระทู้หมายเลขคู่</center><br>";
    }
    else{
        echo "เป็นกระทู้หมายเลขคี่</center><br>";
    }
    ?>

    <?php 
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
        $sql = "SELECT c.* , u.name FROM comment c , user u WHERE c.user_id = u.id AND c.post_id = $id;";
        $data = $conn->query("SELECT p.id,p.title,p.content,p.post_date ,c.name,u.name FROM post p , user u , category c WHERE p.id = $id AND p.user_ID = u.id;");
        ?>
        <div class="card text-dark bg-white border-primary mb-3">
            <?php $row = $data->fetch(); ?>
                        <div class="card-header bg-primary text-white"><?= $row['1']; ?></div>
                            <div class="card-body pb-1">
                            
                                <div class="container row mb-3 justify-content-between">
                                    
                                        <?= $row['2']; ?> <br><br>
                                        <?= $row['5'] . " - " . $row['3']; ?>
                                    
                                </div>
                            </div>
                        </div>
        <?php
        $result=$conn->query($sql);
        $i = 0;
            foreach($conn->query($sql) as $row){
                $i++;
                ?>
                <div class="card text-dark bg-white border-info mb-3">
                     <div class="card-header bg-info text-white"><?= " ความคิดเห็นที่ ".$i; ?></div>
                            <div class="card-body pb-1">
                            
                                <div class="container row mb-3 justify-content-between">
                                    
                                        <?= $row['1']; ?> <br><br>
                                        <?= $row['5'] . " - " . $row['2']; ?>
                                    
                                </div>
                            </div>
                        </div>
                <?php
            
                            
            }
        $conn = null;
    ?>
<?php
    if(isset($_SESSION["id"])){ 
        
    ?>
    <div class="card text-dark bg-white border-success">
        <div class="card-header bg-success text-white">แสดงความคิดเห็น</div>
        <div class="card-body">
            <form action="post_save.php" method="post">
                <input type="hidden" name="post_id" value="<?= $id; ?>">
                <div class="row mb-3 justify-content-center">
                    <div class="col-lg-10">
                        <textarea name="comment" class="form-control" rows="8"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <center>
                            <button type="submit" class="btn btn-success btn-sm text-white">
                                <i class="bi bi-box-arrow-up-right me-1"></i>
                                ส่งข้อความ
                            </button>
                        </center>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    }
        
    ?>

</section> 
</div>
</body>

</html>