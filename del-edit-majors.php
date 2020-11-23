<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Khoa</title>
    <link href="./img/student.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reset.css">
</head>
<body>
    <?php
        $active = array("","","","","","");
        $active[3] = "active";
        include_once "./main/header.php";
        if(isset($_POST['del-btn'])){
            $id = $_POST['id'];
            include_once "./database/database.php";
            $sql = "DELETE FROM majors WHERE id = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "SQL statement failed";
            }
            else{
                mysqli_stmt_bind_param($stmt,"i",$id);
                mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
            header("location: ./majorsList.php");
            exit();
        }
        if(isset($_POST['edit-btn'])){
            $id = $_POST['id'];
    ?>
    <main>
        <div class="wrapper-del-edit">
            <h1>Sửa Khoa</h1><br>
            <form action="./function/edit-majors-func.php" method="POST">
                <input type='hidden' name="majorsId" value="<?php echo $id ?>">
                <input type='number'  value="<?php echo $id ?>" disabled><br>
                <input type="text" name="name" placeholder="Tên Khoa Mới..."><br>
                <button type="submit" name="submit" class="add-btn" value="submit">Lưu</button>
            </form> 
        </div>
    </main>
    <?php
        }
    ?>
    <?php
        include_once "./main/footer.php";
    ?>
</body>
</html>


