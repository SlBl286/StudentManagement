<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Lớp</title>
    <link href="./img/student.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reset.css">
</head>
<body>
    <?php
        $active = array("","","","","");
        $active[2] = "active";
        include_once "./main/header.php";
    ?>
    <main>
        <div class="wrapper-addclass">
            <h1>Thêm Lớp</h1><br>
            <form action="function/addClass-func.php" method="post">
                <input type="text" name="name" placeholder="Tên Lớp..."><br>
                <select name="majors">
                <option value="" disabled selected>Chọn Khoa</option>
                    <?php
                        include_once "./database/database.php";
                        $sql = "SELECT * FROM majors ";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo "SQL statement failed";
                        }
                        else{
                            mysqli_stmt_bind_param($stmt,"s",$value);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            foreach ($result as $row ) { 
                    ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>  
                <button type="submit" class="add-btn" name="submit">Thêm</button>
            </form> 
            <div class="Warning">
            <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == 'emptyinput'){
                            echo "<p>Bạn cần nhập tên Lớp</p>";
                        }
                        if($_GET['error'] == 'valueExit'){
                            echo "<p>Lớp đã tồn tại</p>";
                        }
                    }
                ?>
            </div>
        </div>
    </main>
    <?php
        include_once "./main/footer.php";
    ?>
</body>
</html>
