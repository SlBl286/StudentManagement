<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên</title>
    <link href="./img/student.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reset.css">
</head>
<body>
    <?php
        $active = array("","","","","");
        $active[1] = "active";
        include_once "./main/header.php";
    ?>
    <main>
        <div class="wrapper-addstudent">
            <h1>Thêm Sinh Viên</h1><br>
            <form action="function/addStudent-func.php" method="post">
                <input type="text" name="first_name" placeholder="Họ..."><br>
                <input type="text" name="last_name" placeholder="Tên..."><br>
                <input type="date" name="birthday"><br>
                <input type="radio" name="sex" value="nam">Nam
                <input type="radio" name="sex" value="nu">Nữ
                <input type="radio" name="sex" value="khac">Khác<br>
                <input type="text" name="phone" placeholder="SĐT..."><br>
                <input type="text" name="email" placeholder="Mail..."><br>
                <input type="text" name="address" placeholder="Địa Chỉ..."><br>
                <select name="classId">
                <option value="" disabled selected>Chọn Lớp</option>
                    <?php
                        include_once "./database/database.php";
                        $sql = "SELECT * FROM classes ";
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
                <button type="submit" name="submit" class="add-btn">Thêm</button>
            </form> 
            <div class="Warning">
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == 'emptyinput'){
                            echo "<p>Bạn cần nhập đầy đủ thông tin</p>";
                        }
                        if($_GET['error'] == 'valueExit'){
                            echo "<p>Sinh Viên đã tồn tại</p>";
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


