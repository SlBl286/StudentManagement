<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Lớp</title>
    <link href="./img/student.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reset.css">
</head>
<body>
    <?php
        $active = array("","","","","","");
        $active[2] = "active";
        include_once "./main/header.php";
        if(isset($_POST['del-btn'])){
            $id = $_POST['id'];
            include_once "./database/database.php";
            $sql = "DELETE FROM classes WHERE id = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "SQL statement failed";
            }
            else{
                mysqli_stmt_bind_param($stmt,"i",$id);
                mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
            header("location: ./classList.php");
            exit();
        }
        if(isset($_POST['edit-btn'])){
            $id = $_POST['id'];
    ?>
    <main>
        <div class="wrapper-del-edit">
            <h1>Sửa Lớp</h1><br>
            <form action="./function/edit-class-func.php" method="POST">
                <input type='hidden' name="classId" value="<?php echo $id ?>">
                <input type='number'  value="<?php echo $id ?>" disabled><br>
                <input type="text" name="name" placeholder="Tên Lớp Mới..."><br>
                <select name="majorsId">
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
                </select><br>
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


