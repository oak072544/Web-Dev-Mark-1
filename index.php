<?php
    session_start();
    if(!isset($_GET['id'])){
        header("Location: index.php?id=0");
    }
    else{
        $id= $_GET['id'];
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
    <title>Webboard Mark 1</title>
    <script>
        function myFunction1()
        {
            let r = confirm("ต้องการจะลบจริงหรือไม่?")
            return r;
        }
    </script>
</head>
<?php
    if(!isset($_SESSION['id']))
        {
?>
<body>
    <div class="container">
    <h1 style="text-align: center;">Webboard Mark 1</h1>
    <?php include "nav.php" ; ?>
    <br>
    <?php
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql = "SELECT * FROM category";
    ?>
    <div class="d-flex">
        <div>
            <label>หมวดหมู่</label>
            <span class="dropdown">
                <button class="btn btn-light dropdown-toggle btn-sm"
                type="button" id ="button2" data-bs-toggle="dropdown"
                aria-expanded="false"><?php
                        if($id != 0)
                            foreach($conn->query("SELECT name FROM category WHERE id = $id") as $row){
                                echo $row['0'];
                            }
                        else{
                            echo '---ทั้งหมด---';
                            
                        }
                        ?></button>
                <ul class="dropdown-menu" aria-labelledby="button2">
                <?php
                            
                            echo "<li><a href=\"index.php?id=0\" class='dropdown-item' value=0 > ---ทั้งหมด---</a></li>";
                            foreach($conn->query($sql) as $row){
                                echo "<li><a href=\"index.php?id=".$row['0']."\" class='dropdown-item' value=".$row['id'].">".$row['name']."</a></li>";
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
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
        $conn -> exec("SET CHARACTER SET utf8");
        if($id != 0){
            $data = $conn->query("SELECT p.id,p.title,p.content,p.post_date ,c.name,u.name FROM post p , user u , category c WHERE p.cat_id = c.id AND c.id = $id AND p.user_id = u.id order by p.id DESC;");
        }else{
            $data = $conn->query("SELECT p.id,p.title,p.content,p.post_date ,c.name,u.name FROM post p , user u , category c WHERE p.cat_id = c.id AND p.user_id = u.id order by p.id DESC;");
        }
        if($data !== false){
            while($row = $data->fetch()){
               // echo "<tr><td><a href=\"post.php?id=".$row['0'].'\" style=text-decoration:none></a>"; 
               echo "<tr><td>";
               echo "[ ".$row['4']." ] ";   
               echo "<a href=\"post.php?id=".$row['0']."\" style=text-decoration:none>";            
               echo $row['1']."</a>";
               echo "<br>";
               echo $row['5']." - " . $row['3'];
               echo "</td></tr>";   
            }
        }
        
        
        $conn = null;
        ?>
    </table>
    </div>
</body>
<?php
        }
        else
        {
            ?>
            <body>
            <div class="container">
            <h1 style="text-align: center;">Webboard Mark 1</h1>
            <?php include "nav.php" ; ?>
            <br>
            <div class="d-flex justify-content-between">
                <div>
                    <label>หมวดหมู่</label>
                    <span class="dropdown">
                        <button class="btn btn-light dropdown-toggle btn-sm"
                        type="button" id ="button2" data-bs-toggle="dropdown"
                        aria-expanded="false"><?php
                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                        if($id != 0)
                        foreach($conn->query("SELECT name FROM category WHERE id = $id") as $row){
                            echo $row['0'];
                        }
                    else{
                        echo '---ทั้งหมด---';
                        
                    }
                        ?></button>
                        <ul class="dropdown-menu" aria-labelledby="button2">
                        <?php
                            
                            $sql = "SELECT * FROM category";
                            echo "<li><a href=\"index.php?id=0\" class='dropdown-item' value=0 > ---ทั้งหมด---</a></li>";
                            foreach($conn->query($sql) as $row){
                                echo "<li><a href=\"index.php?id=".$row['0']."\" class='dropdown-item' value=" . $row['id'] . ">" . $row['name']."</a></li>";
                            }
                            $conn = null;
                        ?>
                        </ul>
                    </span>
                </div>
                <div>
                    <a href="newpost.php" class="btn btn-success btn-sm">
                    <i class="bi bi-plus"></i> สร้างกระทู้</a>
                </div>
            </div>
            <br>
            <table class="table table-striped">

            <?php
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
        $conn -> exec("SET CHARACTER SET utf8");
        if($id != 0){
            $data = $conn->query("SELECT p.id,p.title,p.content,p.post_date ,c.name,u.name FROM post p , user u , category c WHERE p.cat_id = c.id AND c.id = $id AND p.user_id = u.id order by p.id DESC;");
        }else{
            $data = $conn->query("SELECT p.id,p.title,p.content,p.post_date ,c.name,u.name FROM post p , user u , category c WHERE p.cat_id = c.id AND p.user_id = u.id order by p.id DESC;");
        }
        
        if($data !== false){
            while($row = $data->fetch()){
               // echo "<tr><td><a href=\"post.php?id=".$row['0'].'\" style=text-decoration:none></a>"; 
               echo "<tr><td>";
               echo "[ ".$row['4']." ] ";   
               echo "<a href=\"post.php?id=".$row['0']."\" style=text-decoration:none>";            
               echo $row['1']."</a>";
               echo "<br>";
               echo $row['5']." - " . $row['3'];
               if($_SESSION["role"] == "a"){
                echo "</td><td><a href=\"delete.php?id=".$row['0']."\" class=\"btn btn-danger bi bi-trash\" onclick='return myFunction1();'></a>";
                 
            }
               echo "</td></tr>";   
            }
        }
        $conn = null;
        ?>
            </table>
            </div>
            </body>   
            <?php
        }
?>

</html>